<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Toute l'actualité camerounaise sur cTNblog"/>
    <meta name="author" content="Tsopzong Nguegang Cedric"/>
    <meta name="og:title" content="@yield('title')"/>
    <meta property="og:description" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:type" content="website"/>
    <meta property="og:locale" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="article:published_time" content=""/>
    <meta property="article:section" content="blog"/>
    <meta property="article:tag" content=""/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:creator" content="TSOPZONG NGUEGANG Cédric"/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:desciption" content=""/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:site" content="@TsopzongC" />
    <meta name="generator" content="Jekyll v4.0.1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">

    <link href="/css/cust-backg.css" rel="stylesheet">
    <link href="/css/blog.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/blogcomment.css">
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/fontawesome/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/custom-btn.css">

    <style>
      @media (max-width: 767.98px) {
        .blog-cat {
          font-size: .7rem;
        }
      }

      @media (max-width: 767.98px) {
        .blog-aside-title {
          font-size: 1.25rem;
        }
      }

      @media (max-width: 767.98px) {
        .blog-aside-content {
          font-size: .886rem;
        }
      }

      @media (max-width: 767.98px) {
        .blog-aside-meta {
          font-size: .775rem;
        }
      }

      a:hover {
        text-decoration: none;
      }

      .blog-shcom-size {
        margin-top: 0.125rem;
        font-size: .753rem;
        font-weight: bold;
      }

      @media(max-width: 767.98px) {
        .seperator-sm {
          padding-top:5px;
          padding-bottom: 5px;
          border: 1px solid #28a745;
          border-radius: 4px;
          margin-bottom: 1.5rem;
        }
      }

      /*.d-hover:hover {
        background-color: rgba(255, 0, 0, 1);
        display: none;
      }*/

      .w-2 {
        width: 2rem;
      }

      .w-3 {
        width: 2.9rem;
      }

      .b-none {
        border: none;
        cursor: pointer;
        display: inline-block;
        text-align: center;
      }

      @media (min-width: 768px) {
        .blog-aside-title {
          font-size: .9rem;
        }
      }

      @media (min-width: 768px) {
        .blog-aside-content {
          font-size: .7rem;
        }
      }

      @media (min-width: 768px) {
        .blog-aside-meta {
          font-size: .675rem;
        }
      }

      .blog-post-header {
        font-size: 0.85rem;
        font-weight: bold;
      }

      .blog-form-control-bs:focus {
        box-shadow: 0 0.1rem 0.2rem 0 #28a745;
        border-color: #28a745;
      }

        @media (min-width: 768px) {
          .title-text {
             overflow: hidden;
             text-overflow: ellipsis;
             display: -webkit-box;
             line-height: 16px;     /* fallback */
             max-height: 48px;      /* fallback */
             -webkit-line-clamp: 3; /* number of lines to show */
             -webkit-box-orient: vertical;
           }
        }

        @media (max-width: 767.98px) {
          .title-text {
             overflow: hidden;
             text-overflow: ellipsis;
             display: -webkit-box;
             line-height: 23px;     /* fallback */
             max-height: 46px;      /* fallback */
             -webkit-line-clamp: 2; /* number of lines to show */
             -webkit-box-orient: vertical;
           }
        }

        @media (max-width: 767.98px) {
           .descrip-text {
             overflow: hidden;
             text-overflow: ellipsis;
             display: -webkit-box;
             line-height: 20px;     /* fallback */
             max-height: 40px;      /* fallback */
             -webkit-line-clamp: 2; /* number of lines to show */
             -webkit-box-orient: vertical;
           }
        }

        @media (min-width: 768px) {
           .descrip-text {
             overflow: hidden;
             text-overflow: ellipsis;
             display: -webkit-box;
             line-height: 16px;     /* fallback */
             max-height: 32px;      /* fallback */
             -webkit-line-clamp: 2; /* number of lines to show */
             -webkit-box-orient: vertical;
           }
        }

      .metadata {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        line-height: 16px;     /* fallback */
        max-height: 16px;      /* fallback */
        -webkit-line-clamp: 1; /* number of lines to show */
        -webkit-box-orient: vertical;
      }

      .titlentext {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        line-height: 22.7px;     /* fallback */
        max-height: 90.8px;      /* fallback */
        -webkit-line-clamp: 4; /* number of lines to show */
        -webkit-box-orient: vertical;
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .tags a:hover {
        text-decoration: underline;
      }
    </style>
    <!-- Custom styles for this template -->
    <!--link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet"-->
    <!-- Custom styles for this template -->

  </head>
  <body>
      <header class="blog-header py-2 bg-white" id="header">
        <div class="container">
          <div class="row flex-nowrap align-items-center">

            <div class="col-lg-2">
              <a class="blog-header-logo font-weight-bolder" href="{{URL::to('/')}}"><span class="text-white bg-success rounded p-1">CTN</span><span class="font-italic text-dark">sblog</span></a>
            </div>

            <div class="col-lg-8 blog-header-search">
              <form action="searchresults" method="get">
                <div class="form-group has-search d-inline">
                  <button type="submit" class=" btn form-control-feedback">
                    <i class="fas fa-search text-success"></i>
                  </button>
                  <input type="text" class="form-control font-italic blog-form-control-bs" name="search" href="#" aria-label="Search" placeholder="Search On The Blog"/>
                </div>
              </form>
            </div>

            <div class="col-lg-2 text-right">
              <a class="btn btn-sm btn-outline-success font-weight-bolder" href="#">Let's Advertise</a>
            </div>

          </div>
        </div>
      </header>


    <div class="container">
      <div class="row">
        <div class="col-md-12 py-1 mb-2">
          <div class="blog-cat d-flex justify-content-center text-white font-weight-bolder">
            <span class="p-2"><i class="far fa-newspaper mr-1"></i>News</span>
            <span class="p-2"><i class="fas fa-lightbulb mr-1"></i>Culture</span>
            <span class="p-2"><i class="fas fa-user-tie mr-1"></i>Style</span>
            <span class="p-2"><i class="fas fa-dove mr-1"></i>Innovation</span>
            <span class="p-2"><i class="fas fa-microscope mr-1"></i>Science</span>
            <span class="p-2"><i class="fas fa-first-aid mr-1"></i>Health</span>
            <span class="p-2"><i class="fab fa-gratipay mr-1"></i>BeautyTips</span>
          </div>
        </div>

        <div class="col-md-12 mb-3">
          <div class="d-flex justify-content-center text-white">
            <svg class="bd-placeholder-img" width="80%" height="130" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/>
              <text x="50%" y="50%" fill="#eceeef" dy=".3em">Ad</text>
            </svg>
          </div>
        </div>
    </div>
  </div>

<div class="mx-3">
  <div class="container-fluid">
    <div class="row mb-2 bg-white rounded">

        @yield('content')

        <aside class="col-md-3">
          <div class="no-gutters mb-3 py-2">
            <div class="seperator-sm"></div>
            <div class="p-2 bg-success text-center text-white">
              <div class="d-inline-block">
                This Week's
              </div>
              Most Visited Posts
            </div>

            @php $k=0; @endphp
            @foreach($visit as $v)

              @if ($v->published)
              <div class="row no-gutters flex-md-row position-relative border-bottom py-2 border-success">
                <div class="col-auto">
                  <svg class="bd-placeholder-img" width="100" height="100" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#55595c"/>
                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Image</text>
                  </svg>
                </div>
                <div class="col px-2 d-flex flex-column position-static">
                  <a href="{{URL::to($v['year'].'/'.$v['month'].'/'.$v['day'].'/'.$v['for_link'])}}" class="text-dark d-block">
                    <h6 class="mb-0 title-text title blog-aside-title">
                      {{$v->title}}
                    </h6>
                  </a>
                  <div class="blog-aside-meta mb-1 text-muted metadata">
                    <i class="fas fa-users mr-1 text-success"></i>
                    <span class="ml-1 mr-1">
                      By
                      <a href="{{URL::to('editor/'.$v['given_name'])}}" class="text-success">
                        {{ $v->user_id }}
                      </a>
                    </span>
                    |
                    <i class="ml-2 mr-1 fas fa-clock text-success"></i>
                    <span>
                        {{$v->month_in_word}} {{$v->day}}, {{$v->year}}
                    </span>
                  </div>
                    <p class="blog-aside-content card-text mb-auto text-justify text-break descrip-text">
                      {!! $v->abbreviation !!}
                    </p>
                </div>

                <div class="col-md-12 text-center blog-shcom-size blog-aside-meta">
                  <div class="d-inline mx-2">
                    <i class="fas fa-comments mr-1"></i>
                    {{$com_ct[$k] ?? 0}}
                    <div class="d-none d-lg-inline-block ">
                      comment(s)
                    </div>
                  </div>
                  |
                  <div class="d-inline mx-2">
                    <a href="#" class="text-success share" data-toggle="modal" data-target="#share{{$v->id}}">
                      <i class="fas fa-share mr-1"></i>
                      Share
                    </a>
                  </div>
                  |
                  <div class="d-inline mx-2">
                    <i class="fas fa-eye mr-1"></i>
                    {{$count[$k]}}
                  </div>
                </div>

                <!-- share Modal-->
                <div class="modal fade" id="share{{$v->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-info">
                        <h5 class="modal-title text-white">Share this on:</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="share_twitter rounded-circle mr-2 py-1 w-2 text-white b-none" style="background-color:#1da1f2;" data-url="{{URL::to($v->year.'/'.$v->month.'/'.$v->day.'/'.$v->for_link)}}">
                          <i class="fab fa-twitter"></i>
                      </div>
                      <div class="share_facebook rounded-circle mx-2 py-1 w-2 text-white b-none" style="background-color:#3c5a99;" data-url="{{URL::to($v->year.'/'.$v->month.'/'.$v->day.'/'.$v->for_link)}}">
                          <i class="fab fa-facebook-f"></i>
                      </div>
                      <div class="share_linkedin rounded-circle mx-2 py-1 w-2 text-white b-none" style="background-color:#0274b3;" data-url="{{URL::to($v->year.'/'.$v->month.'/'.$v->day.'/'.$v->for_link)}}">
                          <i class="fab fa-linkedin-in"></i>
                      </div>
                      <div class="share_whatsapp rounded-circle mx-2 py-1 w-2 text-white b-none" style="background-color:#0dc144;" data-url="{{URL::to($v->year.'/'.$v->month.'/'.$v->day.'/'.$v->for_link)}}">
                          <i class="fab fa-whatsapp"></i>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-light border border-dark" type="button" data-dismiss="modal">Annuler</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              @php $k++; @endphp

              @endif
            @endforeach

            </div>
          </aside><!-- /.blog-sidebar -->


    </div>
  </div><!-- /.container -->

</div>

    <footer class="blog-footer">
      <p class="text-muted">Copyright &copy; <?php echo date('Y'); ?> - <a href="{{URL::to('/')}}" class="font-weight-bolder text-primary">CTNsblog</a></p>
      <p></p>
    </footer>
    <script type="text/javascript" src="/js/jquery-3.5.1/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="/js/social.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    @yield('js')
    <script type="text/javascript">

    /*jQuery('.share').ScrollAppear({
            ElementAffect : ".share",
        });*/
      $('.form-comment div:first, .form-comment button').hide();

      $(".form-comment .checkbox").on("click", function(){
        if ( $( ".form-comment .checkbox" ).is( ":checked")){
          $(".form-comment .display").slideUp("slow");
        } else {
          $(".form-comment .display").show("slow");
        }
      });

      $(".form-comment textarea").on("click", function(){
        if ( $( ".form-comment .checkbox" ).is( ":checked")){
          $(".form-comment .display").hide();
        } else {
          $(".form-comment .display").show();
        }
        $(".form-comment div:first, .form-comment button").slideDown("slow");
      });

      /*$(document).scroll(function(){

        if($(this).scrollTop()>=435) {
          $("#share").css({
            'position':'fixed',
            'top':'0',
            'background-color':'white',
            'z-index':'2000',
            'width':'53.33%'
          }).removeClass("border-top border-bottom");

        } else {
          $("#share").css({
            'position':'initial',
            'z-index':'initial',
            'width':'initial',
            'background-color':'initial'
          }).addClass("border-top border-bottom");
        }
      });*/
    </script>
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script-->
  </body>
</html>
