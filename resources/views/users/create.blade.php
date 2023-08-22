@extends('layouts.app-master')

@section('page-title')
{{ $title }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <form method="post" action="{{ route('users.store') }}">
                @csrf
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add new user</h3>
            
                        <div class="card-tools">
                            <a href="{{ route('users.index') }}" class="btn btn-dark btn-card-header" title="User"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</a>
                        </div>
                    </div>
                    <div class="card-body row">
                        <div class="col-2 text-center d-flex align-items-center justify-content-center"></div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input value="{{ old('name') }}" 
                                    type="text" 
                                    class="form-control {{ $errors->has('name')? 'is-invalid': '' }}" 
                                    name="name" 
                                    placeholder="Name" required>
            
                                @if ($errors->has('name'))
                                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input value="{{ old('email') }}"
                                    type="email" 
                                    class="form-control {{ $errors->has('email')? 'is-invalid': '' }}" 
                                    name="email" 
                                    placeholder="Email address" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="username" class="form-label">Username</label>
                                <input value="{{ old('username') }}"
                                    type="text" 
                                    class="form-control {{ $errors->has('username')? 'is-invalid': '' }}" 
                                    name="username" 
                                    placeholder="Username" required>
                                @if ($errors->has('username'))
                                    <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">Password</label>
                                <input value="{{ old('password') }}"
                                    type="password" 
                                    class="form-control {{ $errors->has('password')? 'is-invalid': '' }}" 
                                    name="password" 
                                    placeholder="Password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input value="{{ old('password_confirmation') }}"
                                    type="password" 
                                    class="form-control {{ $errors->has('password_confirmation')? 'is-invalid': '' }}" 
                                    name="password_confirmation" 
                                    placeholder="Confirm Password" required>
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-control {{ $errors->has('role')? 'is-invalid': '' }}" 
                                    name="role" required>
                                    <option value="">Select role</option>
                                    @foreach($roles as $role)
                                        @php
                                            $role_selected = "";
                                            if(old('role')) {
                                                $role_selected = ($role->id == old('role')) 
                                                ? 'selected'
                                                : '';
                                            }
                                        @endphp
                                        <option value="{{ $role->id }}"
                                            {{ $role_selected }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('role'))
                                    <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <button type="submit" class="btn btn-primary">Save user</button>
                            <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </form>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
@endsection