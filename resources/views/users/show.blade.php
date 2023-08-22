@extends('layouts.app-master')

@section('page-title')
{{ $title }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <div class="card card-outline card-primary">
            <div class="card-header">
            <h3 class="card-title">User Information</h3>

            <div class="card-tools">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-card-header" title="Edit User"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                <a href="{{ route('users.index') }}" class="btn btn-dark btn-card-header" title="User"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</a>
            </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                      <tr>
                        <th>Name</th>
                        <td>{{ $user->name }}</td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                      </tr>
                      <tr>
                        <th>Username</th>
                        <td>{{ $user->username }}</td>
                      </tr>
                      <tr>
                        <th>Role</th>
                        <td>
                            @foreach($user->roles as $role)
                                <span class="badge bg-primary">{{ $role->name }}</span>
                            @endforeach
                        </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
@endsection