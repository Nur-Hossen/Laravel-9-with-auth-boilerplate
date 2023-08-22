@extends('layouts.app-master')

@section('page-title')
{{ $title }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <form method="post" action="{{ route('roles.store') }}">
                @csrf
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add new role
                            <small>Add new role and assign permissions.</small>
                        </h3>
            
                        <div class="card-tools">
                            <a href="{{ route('roles.index') }}" class="btn btn-dark btn-card-header" title="User"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</a>
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
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @if ($errors->has('permission'))
                                                <li>{{ $errors->first('permission') }}</li>
                                            @endif
                                        </ul>
                                    </div>
                                @endif
                                <label for="permissions" class="form-label">Assign Permissions</label>
                                <table class="table table-striped">
                                    <thead>
                                        <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                                        <th scope="col" width="20%">Name</th>
                                        <th scope="col" width="1%">Guard</th> 
                                    </thead>

                                    @foreach($permissions as $permission)
                                        <tr>
                                            <td>
                                                <input type="checkbox" 
                                                name="permission[{{ $permission->name }}]"
                                                value="{{ $permission->name }}"
                                                class='permission'>
                                            </td>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->guard_name }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <button type="submit" class="btn btn-primary">Save Role</button>
                            <a href="{{ route('roles.index') }}" class="btn btn-default">Cancel</a>
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

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {

                if($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',false);
                    });
                }

            });
        });
    </script>
@endsection