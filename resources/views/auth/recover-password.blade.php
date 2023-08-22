@extends('layouts.auth-master')

@section('content')
    <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
    @include('layouts.partials.messages')
    <form action="{{ route('reset_password.reset') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="username" value="{{ isset($username)? $username: old('username') }}" />
        <div class="input-group mb-3">
            <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Change password</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <p class="mt-3 mb-1">
        <a href="login.html">Login</a>
    </p>
@endsection