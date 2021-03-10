@extends('layouts.app')

@section('content')
<div class="container-fluid" style="height:100vh;">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-md-5 bg-dark" style="height:100vh;">
        <div class="px-5 pt-5">
          <div class="text-center mb-4">
            <h1 class="h3 text-gray-900 login-logo"><b>cTN's</b> blog login page</h1>
            <span>Ready to start blogging ?</span>
          </div>
          <form class="user" method="POST" action="{{ route('login') }}" enctype="multipart/form-data">

              @csrf

              <div class="input-group mb-3">

                      <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus aria-describedby="emailHelp" placeholder="Enter Email Address...">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                        </div>
                      </div>
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

              </div>

              <div class="input-group mb-3">

                      <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                        </div>
                      </div>
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

              </div>

              <div class="form-group">
                  <div class="icheck-primary">
                      <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                      <label for="remember">
                          {{ __('Remember Me') }}
                      </label>
                  </div>
              </div>

              <button type="submit" class="btn btn-primary btn-user btn-block">
                {{ __('Login') }}
              </button>
              @if (Route::has('password.request'))
                  <a class="btn btn-link btn-user btn-block" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
              @endif
          </form>
        </div>
      </div>
      <div class="col-md-7 d-none d-md-block bg-login-image"></div>
    </div>
</div>
@endsection
