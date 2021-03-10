<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\BlogPost;

class CommentController extends Controller
{

    /*
     *
     *
     */
    public function insert_comment($y, $m, $d, $url) {

      $id = BlogPost::where('for_link', $url)
                    ->value('id');

      $name = mb_convert_case(request('name'), MB_CASE_TITLE, "UTF-8");

      $email = mb_convert_case(request('email'), MB_CASE_LOWER, "UTF-8");

      if(request('checkbox')) {
        request()->validate([
          'comment' => ['required'],
        ]);
        $comment = Comment::create([
          'post_id' => $id,
          'comment' => request('comment'),
          'level' => 1,
          'visitor_ip' => request()->ip(),
          'response_to' => null,

        ]);
      } else {
        request()->validate([
          'email' => ['required', 'email'],
          'name' => ['required'],
          'comment' => ['required'],
        ]);
        $comment = Comment::create([
          'post_id' => $id,
          'name' => $name,
          'email' => $email,
          'comment' => request('comment'),
          'level' => 1,
          'visitor_ip' => request()->ip(),
          'response_to' => null,

        ]);
      }

      $success = "Your comment has been submit";

      return back()->withInput()->with('success', $success);
    }

}
