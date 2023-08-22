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
            <h1 class="card-title">{{ ucfirst($role->name) }} Role</h1>

            <div class="card-tools">
                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-card-header" title="Edit User"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                <a href="{{ route('roles.index') }}" class="btn btn-dark btn-card-header" title="User"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</a>
            </div>
            </div>
            <div class="card-body">
                <h3>Assigned permissions</h3>
                <table class="table table-striped">
                    <thead>
                        <th scope="col" width="20%">Name</th>
                        <th scope="col" width="1%">Guard</th> 
                    </thead>
    
                    @foreach($rolePermissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                        </tr>
                    @endforeach
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