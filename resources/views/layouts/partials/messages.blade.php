{{-- @if(isset ($errors) && count($errors) > 0)
    <div class="alert alert-warning alert-dismissible auto-dismiss" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <ul class="list-unstyled mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

@if(Session::get('error', false))
    <?php $data = Session::get('error'); ?>
    <div class="alert alert-danger alert-dismissible auto-dismiss" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-ban"></i>
        {{ $data }}
    </div>
@endif

@if(Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $msg)
            <div class="alert alert-success alert-dismissible auto-dismiss" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-check"></i>
                {{ $msg }}
            </div>
        @endforeach
    @else
        <div class="alert alert-success alert-dismissible auto-dismiss" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>
            {{ $data }}
        </div>
    @endif
@endif

@if(Session::get('warning', false))
    <?php $data = Session::get('warning'); ?>
    <div class="alert alert-warning alert-dismissible auto-dismiss" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-exclamation-triangle"></i>
        {{ $data }}
    </div>
@endif

@if(Session::get('info', false))
    <?php $data = Session::get('info'); ?>
    <div class="alert alert-info alert-dismissible auto-dismiss" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-info"></i>
        {{ $data }}
    </div>
@endif