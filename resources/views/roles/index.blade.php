@extends('layouts.app-master')

@section('page-title')
{{ $title }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card card-outline card-primary collapsed-card">
                <div class="card-header">
                <h3 class="card-title">Filter Section</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-plus"></i>
                    </button>
                </div>
                </div>
                <div class="card-body" style="display: none;">
                  {!! Form::open(['method' => 'GET', 'class' => '' ,'route' => ['roles.index']]) !!}
                    <div class="row">
                      <div class="col-3">
                        <div class="form-group">
                          <label for="name" class="form-label">Name</label>
                          <input value="{{ isset($filter_data['name'])? $filter_data['name']:'' }}" 
                              type="text" 
                              class="form-control {{ $errors->has('name')? 'is-invalid': '' }}" 
                              name="name" 
                              placeholder="Name">
      
                          @if ($errors->has('name'))
                              <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                          @endif
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="role" class="form-label col-12">&nbsp;&nbsp;</label>
                          <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i>&nbsp;&nbsp;Search</button>
                        </div>
                      </div>
                    </div>
                  {!! Form::close() !!}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ $title }}
                    <small>Manage your roles here.</small>
                </h3>

                <div class="card-tools">
                    <a href="{{ route('roles.create') }}" class="btn btn-primary btn-card-header" title="Add Role"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New Role</a>
                    <button type="button" class="btn btn-tool" title="Full Screen" data-card-widget="maximize">
                        <i class="fas fa-expand"></i>
                      </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="data_table" class="table table-bordered table-striped data-table">
                  <thead>
                  <tr>
                    <th width="1%">#</th>
                    <th width="15%">Name</th>
                    <th width="3%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i = $roles->firstItem())
                    @foreach ($roles as $key => $role)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $role->name }}</td>
                        {!! Form::open(['method' => 'DELETE', 'class' => 'delete-form' ,'route' => ['roles.destroy', $role->id]]) !!}
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                        {!! Form::close() !!}
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th width="1%">#</th>
                    <th width="15%">Name</th>
                    <th width="3%">Action</th>
                  </tr>
                  </tfoot>
                </table>
                <div class="table-pagination-section">
                  {{ $roles->links('layouts.partials.pagination') }}
                </div>
                
                </div>
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