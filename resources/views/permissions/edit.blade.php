@extends('layouts.app-master')

@section('page-title')
{{ $title }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                @method('patch')
                @csrf
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update permission</h3>
            
                        <div class="card-tools">
                            <a href="{{ route('permissions.index') }}" class="btn btn-dark btn-card-header" title="User"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</a>
                        </div>
                    </div>
                    <div class="card-body row">
                        <div class="col-2 text-center d-flex align-items-center justify-content-center"></div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input value="{{ $errors->has('name')? old('name') : $permission->name }}" 
                                    type="text" 
                                    class="form-control {{ $errors->has('name')? 'is-invalid': '' }}" 
                                    name="name" 
                                    placeholder="Name" required>
            
                                @if ($errors->has('name'))
                                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <button type="submit" class="btn btn-primary">Save permission</button>
                            <a href="{{ route('permissions.index') }}" class="btn btn-default">Cancel</a>
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
