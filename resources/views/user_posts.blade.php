@extends('layout')

@section('title')

  Tsopzong N. Cedric | {{ $post->name }}'s posts

@endsection

@section('content')

<div class="col-md-8">
  <div class="row m-border-right">
    @if ($name != null)
      <div class="col-md-12">
        {{ $post->name }} is an editor at cTNblog
      </div>
    @endif

    @php
      $n=0;
    @endphp
    @foreach ($posts as $post)

    <div class="col-md-12">
      <div class="row no-gutters flex-md-row position-relative display-border py-2">
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="100%" height="175" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#55595c"/>
            <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
          </svg>
        </div>

        <div class="col px-2 d-flex flex-column position-static">
          <a href="/{{$d[$n][0]}}/{{$d[$n][3]}}/{{$d[$n][2]}}/{{$post->for_link}}" class="text-dark title"><h5 class="mb-0">{{ $post->title }}</h5></a>
          <div class="mb-1 text-muted blog-mfs-sm">By <a href="#" class="text-success border-right border-success pr-2 mr-2">{{ $post->name }}</a><i class="fas fa-clock mr-1 text-success"></i>{{ $d[$n][1] }} {{ $d[$n][2] }}, {{ $d[$n][0] }}</div>
          <p class="card-text mb-auto blog-pi-sm text-justify text-break">{!! $post->abbreviation !!}</p>
          <a href="/{{$d[$n][0]}}/{{$d[$n][3]}}/{{$d[$n][2]}}/{{$post->for_link}}" class="blog-pi-sm">View...</a>
        </div>

        <div class="col-md-12 d-flex justify-content-center p-1 blog-shcom-size">
          <div class="d-inline px-3">
            <i class="fas fa-comments mr-1"></i> 0 comment(s)
          </div>
          <div class="border-left border-dark text-dark d-inline pl-3">
            <a href="#" class="text-success"><i class="fas fa-share mr-1"></i> Share </a>
          </div>
        </div>
      </div>
    </div>

      @php
        $n++;
      @endphp

    @endforeach

  <div class="col-md-12">
    {{ $posts->links() }}
  </div>
</div>
</div>

  @endsection
