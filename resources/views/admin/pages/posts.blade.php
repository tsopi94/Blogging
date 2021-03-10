@extends('layouts.admin')

@section('title')

  Edit Articles

@endsection

@section('script')

<!-- image upload -->
<script src="/js/uploadIm.js"></script>

<!-- tinymce -->
<script src="/tinymce/js/tinymce/tinymce.min.js"></script>

<script src="/js/posts.js"></script>

<!-- customize tinymce -->
<script src="/js/custom-WYSIWYG.js"></script>

@endsection

@section('css')

<!-- Image Upload -->
<link rel="stylesheet" href="/css/imageUp.css">

@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Articles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Articles</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      @if (session('message'))
        <div class="alert alert-success text-center" id="messuc">
           {{ session('message') }}
        </div>
      @endif
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <form role="form" method="post" id="form-post" action="{{route('edit')}}" enctype="multipart/form-data">
              @csrf
                <div class="card-body mb-3 pad">
                  <div class="form-group title-div">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter title">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group tags-div">
                    <label for="tags">Tags</label>
                    <input type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" id="tags" placeholder="Tags">
                    @error('tags')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <!--div class="form-group da">
                    <label for="image_uploads" class="btn btn-info">Desc. Image</label>
                    <input type="file" class="custom-file-input" name="image_uploads" id="image_uploads">
                    <div class="preview">
                      <p>No image currently selected for upload</p>
                    </div>
                  </div-->

                  <div class="form-group content-div">
                    <label for="content">Content</label>
                    <textarea class="textarea form-control @error('content') is-invalid @enderror" name="content" id="content" placeholder="Edit the content here"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="post_content"></textarea>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" name="sv" id="sv" class="btn btn-primary float-left" value="Save"/>
                  <input type="submit" name="sv-psh" id="sv-psh" class="btn btn-primary float-right" value="Save & Publish"/>
                </div>
              </form>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
