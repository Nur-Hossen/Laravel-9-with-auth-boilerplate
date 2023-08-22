@extends('layouts.auth-master')

@section('content')
  <p class="login-box-msg"><label>Demo User:</label> admin, <label>Pass:</label> admin123</p>
  <p class="login-box-msg">Sign in to start your session</p>
  @include('layouts.partials.messages')

  <form method="post" action="{{ route('login.perform') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="input-group mb-3">
      <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Email or Username" required="required" autofocus>
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-envelope"></span>
        </div>
      </div>
      @if ($errors->has('username'))
            <span class="text-danger text-left">{{ $errors->first('username') }}</span>
        @endif
    </div>
    <div class="input-group mb-3">
      <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
      @if ($errors->has('password'))
            <span class="text-danger text-left">{{ $errors->first('password') }}</span>
        @endif
    </div>
    <div class="row">
      <div class="col-8">
        <div class="icheck-primary">
          <input type="checkbox" id="remember" name="remember" value="1">
          <label for="remember">
            Remember Me
          </label>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
      </div>
      <!-- /.col -->
    </div>
  </form>

  {{-- <div class="social-auth-links text-center mt-2 mb-3">
    <a href="#" class="btn btn-block btn-primary">
      <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
    </a>
    <a href="#" class="btn btn-block btn-danger">
      <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
    </a>
  </div> --}}
  <!-- /.social-auth-links -->

  <p class="mb-1">
    <a href="{{ route('forgot_password.show') }}">I forgot my password</a>
  </p>
  {{-- <p class="mb-0">
    <a href="register.html" class="text-center">Register a new membership</a>
  </p> --}}
  @include('auth.partials.copy')
@endsection
