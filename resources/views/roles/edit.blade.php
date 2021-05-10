@extends('layouts.app')

@section('content')
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route('roles.index') }}">Roles</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('roles.show', $role->id) }}">{{ $role->name }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('roles.update', $role->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" name="name" id="name" required autocomplete="name" autofocus
                                   class="form-control form-control-lg @error('name') is-invalid @enderror"
                                   value="{{ old('name', $role->name) }}"/>
                            @error('name')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success mr-2">
                            <i class="mdi mdi-pencil"></i> {{ __('Update') }}
                        </button>
                        <button class="btn btn-light">{{ __('Cancel') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection