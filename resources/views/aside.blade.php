<aside class="col-md-4">
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

    <div class="row no-gutters flex-md-row position-relative border-bottom py-2 border-success">
      <div class="col-auto">
        <svg class="bd-placeholder-img" width="100" height="100" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#55595c"/>
          <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
        </svg>
      </div>
      <div class="col px-2 d-flex flex-column position-static">
        <a href="/{{$v['year']}}/{{$v['month']}}/{{$v['day']}}/{{ $v['for_link'] }}" class="text-dark d-block">
          <h6 style="font-size: .90rem;" class="mb-0 title-text title">
            {{$v->title}}
          </h6>
        </a>
        <div class="blog-aside-meta mb-1 text-muted metadata">
          By
          <a href="/editor/{{ $v['name'] }}" class="text-success border-right border-success pr-2 mr-2">
            {{ $v->name }}
          </a>
          <div class="d-inline">
            <i class="fas fa-clock mr-1 text-success"></i>
              {{$v->month_in_word}} {{$v->day}}, {{$v->year}}
          </div>
        </div>
          <p class="blog-aside-content card-text mb-auto text-justify text-break descrip-text">
            {!! $v->abbreviation !!}
          </p>
      </div>

      <div class="col-md-12 text-center blog-shcom-size blog-aside-meta">
        <div class="border-dark d-inline px-3">
          <i class="fas fa-comments mr-1"></i> {{$com_ct[$k] ?? 0}} <div class="d-none d-lg-inline-block ">comment(s)</div>
        </div>
        <div class="border-left border-dark text-dark d-inline px-3">
          <a href="#" class="text-success share"><i class="fas fa-share mr-1"></i> Share </a>
        </div>
        <div class="border-left border-dark text-dark d-inline px-3">
          <i class="fas fa-eye mr-1"></i> {{$count[$k]}}
        </div>
      </div>
    </div>

    @php $k++; @endphp
    @endforeach

    </div>
  </aside><!-- /.blog-sidebar -->
