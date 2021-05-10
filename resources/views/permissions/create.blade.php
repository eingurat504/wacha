@extends('layouts.app')

@section('content')
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('permissions.index') }}">Permissions</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{--<div class="border-bottom">--}}
                    {{--<h4 class="card-title">Permissions</h4>--}}
                    {{--</div>--}}
                    <form method="POST" action="{{ route('permissions.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" name="name" id="name" required autocomplete="name" autofocus
                                   class="form-control form-control-lg @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}"/>
                            <small>Format: <code>action-resource</code> like; <code>create-users</code></small>
                            @error('name')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">
                            <i class="mdi mdi-plus"></i> {{ __('Create') }}
                        </button>
                        <a class="btn btn-light" href="{{ route('permissions.index') }}">{{ __('Cancel') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection