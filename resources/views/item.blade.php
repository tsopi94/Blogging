@extends('layout')

@section('title')

  {{ $article[0]->title }}

@endsection

@section('js')

  <script src="/js/comment.js"></script>

@endsection

@section('content')

<div class="col-md-8 m-border-right">
  <div class="row">
    <div class="col-md-12">

      <main role="main" class="mb-3">

        <div class="border-top border-bottom d-flex justify-content-center p-1 mb-1 blog-post-header">
          <div class="d-inline px-3">
            <i class="fas fa-comments mr-1"></i>
            <span class="cmt-nbr">
              {{$cur_com_ct ?? 0}}
            </span>
            comment(s)
          </div>
        </div>
        <div class="mb-3 text-justify">
          <h2 class="blog-post-title">{{ $article[0]->title }}</h2>
          <p class="blog-post-meta">
            <i class="fas fa-users text-success"></i>
            <span class="ml-1 mr-1">
              By
              <a href="{{URL::to('editor/'.$article[0]->given_name) }}" class="text-success">
                {{ $article[0]->given_name }}
              </a>
            </span>
            |
            <i class="fas fa-clock ml-2 mr-1 text-success"></i>
            <span class="mr-1">
              {{ $article[0]->month_in_word }} {{ $article[0]->day }}, {{ $article[0]->year }}
            </span>
            |
            <i class="ml-2 mr-1 fas fa-bookmark text-success"></i>
            <span class="tags">
              {!! $article[0]->tags !!}
            </span>
          </p>
          <div class="border-top border-bottom py-2 mb-3" id="share">
            <div class="align-middle text-muted d-inline-block font-weight-bold mr-2" style="font-size:0.7rem;">
              <div class="text-center">
                0
              </div>
              share(s)
            </div>
            <div class="share_twitter rounded-circle mr-2 py-1 w-2 text-white b-none" style="background-color:#1da1f2;" data-url="{{URL::to($article[0]->year.'/'.$article[0]->month.'/'.$article[0]->day.'/'.$article[0]->for_link)}}">
                <i class="fab fa-twitter"></i>
            </div>
            <div class="share_facebook rounded-circle mx-2 py-1 w-2 text-white b-none" style="background-color:#3c5a99;" data-url="{{URL::to($article[0]->year.'/'.$article[0]->month.'/'.$article[0]->day.'/'.$article[0]->for_link)}}">
                <i class="fab fa-facebook-f"></i>
            </div>
            <div class="share_linkedin rounded-circle mx-2 py-1 w-2 text-white b-none" style="background-color:#0274b3;" data-url="{{URL::to($article[0]->year.'/'.$article[0]->month.'/'.$article[0]->day.'/'.$article[0]->for_link)}}">
                <i class="fab fa-linkedin-in"></i>
            </div>
            <div class="share_whatsapp rounded-circle mx-2 py-1 w-2 text-white b-none" style="background-color:#0dc144;" data-url="{{URL::to($article[0]->year.'/'.$article[0]->month.'/'.$article[0]->day.'/'.$article[0]->for_link)}}">
                <i class="fab fa-whatsapp"></i>
            </div>
          </div>

          <p class="mb-auto text-justify">{!! $article[0]->post !!}</p>
        </div><!-- /.blog-post -->

        <div class="border-top border-bottom d-flex justify-content-center p-1 blog-post-header">
          <div class="d-inline px-3">
            <i class="fas fa-comments mr-1"></i> <span class="cmt-nbr">{{$cur_com_ct ?? 0}}</span> comment(s)
          </div>
        </div>

      </main><!-- /.blog-main -->
    </div>

<!-- comments -->
    <div class="col-md-12">
      <div class="comments bg-light py-3 px-2 rounded-top">
        @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
        @endif
        @foreach($comments as $c)
          <div class="mb-1 border-top border-success comment-item">
            <div class="row no-gutters flex-md-row position-relative comment-meta-header mt-1 justify-content-center">
              <div class="col-auto avatar mx-2">
                <i class="fas fa-user-circle fa-3x text-muted"></i>
              </div>
              <div class="col d-flex flex-column position-static pl-1">
                <div class="font-weight-bold mt-1" style="font-size:.8rem;color:#3ca778">
                  {{$c->name ?? 'Anonymous'}}
                </div>
                <div class="text-muted font-italic font-weight-bold" style="font-size:.8rem;">
                  {{$c->month_in_word}} {{$c->day}}, {{$c->year}} at {{$c->hour}}:{{$c->min}} (Dla)
                </div>
              </div>
            </div>
            <div class="px-2 bg-white rounded-lg">
              {{$c->comment}}
            </div>
            <div class="text-center pt-1 font-weight-bold fa-xs">
              <a href="#" class="mr-5"><span class="text-muted like">Like</span> <i class="text-success far fa-thumbs-up"></i><span class="text-success">(0)</span> </a>
              <a href="#" class="mr-5"><span class="text-muted dislike">Dislike</span> <i class="text-danger far fa-thumbs-down"></i><span class="text-danger">(0)</span></a>
              <a href="#"><span class="text-muted reply">Reply</span> <i class="fas fa-reply"></i></a>
            </div>
          </div>
        @endforeach
      </div>

      <div class="mb-1">
        <div class="bg-success mb-2 rounded font-weight-bolder text-white py-2 text-center h6">
          LEAVE A COMMENT
        </div>
        <form class="form-comment" id="form-comment" method="post" action="{{URL::to($article[0]->year.'/'.$article[0]->month.'/'.$article[0]->day.'/'.$article[0]->for_link)}}" enctype="multipart/form-data">

            @csrf

          <div>
            <div class="d-inline">
              <input type="checkbox" class="checkbox" name="checkbox">
              <label>Be anonymous</label>
            </div>

            <!--div class="d-inline">
              <a href="#" class="d-inline btn btn-google btn-user btn-block">
                <i class="fab fa-google fa-fw"></i> Google
              </a>
              <a href="#" class="d-inline btn btn-facebook btn-user btn-block">
                <i class="fab fa-facebook-f fa-fw"></i> Facebook
              </a>
            </div-->

            <div class="form-label-group display name-div">
              <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old ('name')}}">
              <label for="name">Name</label>
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

             <div class="form-label-group display email-div">
               <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" value="{{ old('email') }}">
               <label for="email">Email</label>
               @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
             </div>

             </div>

             <div class="form-label-group comment-div">
               <textarea name="comment" rows="3" class="form-control @error('email') is-invalid @enderror" id="comment" placeholder="Enter your comment" required></textarea>
               <label for="comment"></label>
               @error('comment')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
             </div>

             <button class="btn blog-btn-sm btn-success btn-block" type="submit"> <i class="far fa-paper-plane"></i> Send comment</button>
         </form>
       </div>
     </div>
   </div>
 </div>
@endsection
