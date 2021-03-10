@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Create a User Account!</h1>
            </div>
            <form method="POST" action="{{ route('register') }}" class="user" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <div class="col-md-6 mb-3 mb-sm-0">
                        <input id="givenName" type="text" class="form-control form-control-user @error('givenName') is-invalid @enderror" placeholder="{{ __('First Name') }}" name="givenName" value="{{ old('givenName') }}" required autocomplete="given_name" autofocus>

                        @error('given_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                      <input type="text" class="form-control form-control-user @error('lastName') is-invalid @enderror" id="lastName" placeholder="{{ __('Last Name') }}" name="lastName" value="{{ old('lastName') }}" required>
                      @error('lastName')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                </div>

                <div class="form-group">

                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('Email Address')}}">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group row">
                    <div class="col-md-6 mb-3 mb-sm-0">
                        <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Register User') }}
                </button>
            </form>
            <hr>
            <div class="text-center">
              @if (Route::has('password.request'))
                  <a class="small" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
              @endif
            </div>
            <div class="text-center">
              <a class="small" href="{{ route('login') }}">
                {{ __('Already have an account? Login!') }}
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Custom scripts for uploaded image-->
<script src="/js/uploadIm.js"></script>
@endsection
