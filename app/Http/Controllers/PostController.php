<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    const IWIDTH = 335;
    const IHIGHT = 241;

    /*
    *
    *
    */
    public function latest_posts($name=null) {

      $count = null;
      $comments_count = null;
      $CommentsCount = Comment::select(DB::raw('count(*) as total, post_id'))
                          ->groupBy('post_id');

      $posts = BlogPost::leftJoinSub($CommentsCount,  'comments_counts', function ($join){
                            $join->on('blog_posts.id', '=', 'comments_counts.post_id');
                          })->leftJoin('users', 'users.id', '=', 'blog_posts.user_id')
                            ->select('blog_posts.id', 'blog_posts.tags','blog_posts.image', 'blog_posts.title', 'blog_posts.published', 'blog_posts.for_link', 'users.given_name', 'blog_posts.created_at', 'blog_posts.abbreviation','comments_counts.total')
                            ->when($name, function ($query, $name) {
                              return $query->where('given_name', $name);
                              })
                            ->latest()
                            ->paginate(6);

      $created = BlogPost::leftJoin('users', 'users.id', '=', 'blog_posts.user_id')
                ->select('blog_posts.created_at')
                ->when($name, function ($query, $name) {
                  return $query->where('given_name', $name);
                  })
                ->latest()
                ->paginate(6);


      $most_visited = visits('App\BlogPost')->period('week')->top(20);
      $k = 0;
      foreach ($most_visited as $post) {
        $comments_count[$k] = BlogPost::leftJoinSub($CommentsCount,  'comments_counts', function ($join){
                              $join->on('blog_posts.id', '=', 'comments_counts.post_id');
                              })->where('id', $post['id'])
                                ->value('total');

        $count[$k] = $post->vzt()->count();
        $k++;
      }

        return view('allitems', [
          'posts' => $posts,
          'name' => $name,
          'count' => $count,
          'visit' => $most_visited,
          'com_ct' => $comments_count,
        ]);
    }


    /*
    *
    *
    */
    public function edit_post(Request $request) {

      request()->validate([
        'title' => ['required'],
        'tags' => ['required'],
        'content' => ['required'],
      ]);
      // open an image file
      $id = Auth::id();
      $image = $request->image;

      $ratio = (self::IWIDTH)/(self::IHIGHT);
      $height = Image::make(base_path('public'.$image))->height();
      $width = Image::make(base_path('public'.$image))->width();
      if ($width < $height) {
        $width_n = $width;
        $height_n = intval($width/$ratio);
      } else {
        $height_n = $height;
        $width_n = intval($ratio*$height);
        if ($width_n > $width) {
          $width_n = $width;
          $height_n = intval($width/$ratio);
        }
      }

      $img1 = Image::make(base_path('public'.$image))->crop($width_n, $height_n);
      $img1->resize(self::IWIDTH, self::IHIGHT);
      $img2 = Image::make(base_path('public'.$image))->resize(100, 100);

      //give a new name to the resized image
      $tab = explode('/', $image);
      $filename = $tab[2];
      $newname1 = 'mini1_'.$filename;
      $newname2 = 'mini2_'.$filename;

      //create dir if not exist
      $save_path = "\images\mini";
      if (!file_exists($save_path)) {
            mkdir($save_path, 666, true);
        }

      //save the new image
      $img1->save(base_path('public'.$save_path.'/'.$newname1));
      $img2->save(base_path('public'.$save_path.'/'.$newname2));

      $title = $request->title;
      $morceau = substr($title,0,65).' ...';

      $tag = $request->tags;
      $tab = explode(',', $tag);
      $n = count($tab);
      $j = $n;
      $tags = '';
      $sep = ', ';
      if ($n == 1) {
        $sep = '';
      }
      foreach ($tab as $val) {
        $tags = $tags."<a href='#' class='text-dark'>".$val."</a>".$sep;
        $j--;
        if ($j == 1) {
          $sep = '';
        }
      }


      $post = BlogPost::create([

        'title' => $title,
        'for_link' => '',
        'user_id' => $id,
        'post' => $request->content,
        'abbreviation' => '',
        'published' => $request->publish,
        'tags' => $tags,
        'image' => "<img src='$save_path/$newname1' alt='$morceau'>",

      ]);

      $message = "Successful Registration.";
      return back()->withInput()->with('message', $message);
    }


   /**
    *
    *
    */
    public function get_post($y, $m, $d, $url) {

      $article = BlogPost::leftJoin('users', 'users.id', '=', 'blog_posts.user_id')
                  ->select('blog_posts.title', 'blog_posts.published', 'tags', 'blog_posts.for_link', 'blog_posts.post', 'users.given_name', 'blog_posts.created_at')
                  ->where('for_link', $url)
                  ->get();


      $id = BlogPost::where('for_link', $url)
              ->value('id');

      $articles = BlogPost::find($id);
      $articles->vzt()->increment();


      $CommentsCount = Comment::select(DB::raw('count(*) as total, post_id'))
                          ->groupBy('post_id');
      $cur_com_ct = BlogPost::leftJoinSub($CommentsCount,  'comments_counts', function ($join){
                              $join->on('blog_posts.id', '=', 'comments_counts.post_id');
                            })->where('for_link', $url)
                              ->value('total');
      $most_visited = visits('App\BlogPost')->period('week')->top(20);
      $k = 0;
      foreach ($most_visited as $post) {
        $comments_count[$k] = BlogPost::leftJoinSub($CommentsCount,  'comments_counts', function ($join){
                              $join->on('blog_posts.id', '=', 'comments_counts.post_id');
                            })->where('id', $post['id'])
                              ->value('total');

        $count[$k] = $post->vzt()->count();
        $k++;
      }
      if(empty($most_visited)) {
        $count = null;
        $comments_count = null;
      }

      $comments = Comment::select('post_id', 'email', 'name', 'comment', 'response_to', 'created_at')
                    ->where('post_id', $id)
                    ->oldest()
                    ->get();

      return view('item', [
        'article' => $article,
        'visit' => $most_visited,
        'count' => $count,
        'comments' => $comments,
        'com_ct' => $comments_count,
        'cur_com_ct' => $cur_com_ct,
      ]);
    }

}
