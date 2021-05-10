@extends('layouts.app')

@section('content')
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="">Permissions</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{ route('permissions.show', $permission->id) }}">{{ $permission->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Permissions</li>
            </ol>
        </nav>
        {{--<div>--}}
        {{--<a class="btn btn-sm btn-primary btn-fw" href="{{ route('permissions.create') }}">--}}
        {{--<i class="mdi mdi-plus"></i> Create--}}
        {{--</a>--}}
        {{--</div>--}}
    </div>
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" name="name" id="name" required autocomplete="name" autofocus
                                   class="form-control form-control-lg @error('name') is-invalid @enderror"
                                   value="{{ old('name', $permission->name) }}"/>
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