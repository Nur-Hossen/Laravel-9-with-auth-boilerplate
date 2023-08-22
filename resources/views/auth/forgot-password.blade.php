@extends('layouts.auth-master')

@section('content')

    <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
    @include('layouts.partials.messages')
    <form method="post" action="{{ route('forgot_password.forgot') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="input-group mb-3">
            <input type="username" name="username" value="{{ old('username')? old('username'):'' }}" class="form-control" placeholder="Email or Username">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Request new password</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
    <p class="mt-3 mb-1">
        <a href="login.html">Login</a>
    </p>

@endsection