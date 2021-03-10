@extends('layout')

@section('title')

  CTN's blog | Let's Talk About it

@endsection

@section('content')

<div class="col-md-9">
  <div class="row m-border-right">

    @if ($name != null)
      <div class="col-md-12">
        <div class="row no-gutters flex-md-row position-relative py-2">
          <div class="col-auto no-gutters flex-md-row position-relative py-2">
            <img src="/images/profil.jpg" alt="" height="80" class="rounded-circle">
          </div>
          <div class="col px-2 d-flex flex-column position-static">
            <div> <span class="text-success">{{ $name }}</span> is an editor at CTNblog </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="text-center py-1 bg-success text-white font-weight-bold">
          The Latest from {{ $name }}
        </div>
      </div>
    @endif

    @php
      $n=0;
    @endphp
    @foreach ($posts as $post)

      @if ($post->published)
      <div class="col-md-4 mb-2">
        <div class="no-gutters flex-md-row position-relative mt-2">
          <div class="mb-2">
            <!--svg class="bd-placeholder-img" width="300" height="215" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/>
              <text x="50%" y="50%" fill="#eceeef" dy=".3em">Image</text>
            </svg-->
            {!! $post->image !!}
          </div>

          <div class="position-static">
            <a href="{{URL::to($post->year.'/'.$post->month.'/'.$post->day.'/'.$post->for_link)}}" class="text-dark">
              <h5 class="mb-0 title">{{ $post->title }}</h5>
            </a>
            <div class="mb-1 text-muted blog-mfs-sm metadata">
              <i class="fas fa-users text-success"></i>
              <span class="ml-1 mr-1">
                By
                <a href="{{URL::to('/editor/'.$post->given_name) }}" class="text-success">
                  {{ $post->given_name }}
                </a>
              </span>
              |
              <i class="fas fa-clock ml-2 mr-1 text-success"></i>
              <span class="mr-1">
                {{ $post->month_in_word }} {{ $post->day }}, {{ $post->year }}
              </span>
              |
              <i class="ml-2 mr-1 fas fa-bookmark text-success"></i>
              <span class="tags">
                {!! $post->tags !!}
              </span>
            </div>
            <p class="card-text mb-auto blog-pi-sm text-justify text-break titlentext">
              {!! $post->abbreviation !!}
            </p>
            <a href="{{URL::to($post->year.'/'.$post->month.'/'.$post->day.'/'.$post->for_link)}}" class="blog-pi-sm">More...</a>
          </div>

          <div class="col-md-12 d-flex justify-content-center p-1 blog-shcom-size">
            <div class="d-inline px-3">
              <i class="fas fa-comments mr-1"></i>{{$post->total ?? 0}} comment(s)
            </div>
            <div class="text-dark d-inline">
              |
              <a href="#" class="text-success share ml-2" data-toggle="modal" data-target="#shares{{$post->id}}">
                <i class="fas fa-share mr-1"></i>
                Share
              </a>
            </div>
          </div>
        </div>

        <!-- share Modal-->
        <div class="modal fade" id="shares{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Share this on:</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <span class="share_twitter rounded-circle mr-2 py-1 w-2 text-white b-none" style="background-color:#1da1f2;" data-url="{{URL::to($post->year.'/'.$post->month.'/'.$post->day.'/'.$post->for_link)}}">
                  <i class="fab fa-twitter"></i>
              </span>
              <span class="share_facebook rounded-circle mx-2 py-1 w-2 text-white b-none" style="background-color:#3c5a99;" data-url="{{URL::to($post->year.'/'.$post->month.'/'.$post->day.'/'.$post->for_link)}}">
                  <i class="fab fa-facebook-f"></i>
              </span>
              <div class="share_linkedin rounded-circle mx-2 py-1 w-2 text-white b-none" style="background-color:#0274b3;" data-url="{{URL::to($post->year.'/'.$post->month.'/'.$post->day.'/'.$post->for_link)}}">
                  <i class="fab fa-linkedin-in"></i>
              </div>
              <div class="share_whatsapp rounded-circle mx-2 py-1 w-2 text-white b-none" style="background-color:#0dc144;" data-url="{{URL::to($post->year.'/'.$post->month.'/'.$post->day.'/'.$post->for_link)}}">
                  <i class="fab fa-whatsapp"></i>
              </div>
              <div class="modal-footer">
                <button class="btn btn-light border border-dark" type="button" data-dismiss="modal">Annuler</button>
              </div>
            </div>
          </div>
        </div>
        <hr>
      </div>

        @php
          $n++;
        @endphp
      @endif
    @endforeach

  <div class="col-md-12">
    {{ $posts->links() }}
  </div>
</div>
</div>

@endsection
