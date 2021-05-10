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
                <li class="breadcrumb-item active" aria-current="page">Permissions</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('roles.permissions.sync', $role->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            @foreach ($role->permissions as $permission)
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label" for="{{ $permission['id'] }}">
                                                <input type="checkbox" class="form-check-input"
                                                       id="{{ $permission['id'] }}"
                                                       name="permissions[]"
                                                       value="{{ $permission['id'] }}" {{ ($permission['granted'] === true) ? 'checked' : '' }} />
                                                {{ $permission['name'] }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">
                            <i class="mdi mdi-refresh"></i> {{ __('Sync') }}
                        </button>
                        <a href="{{ route('roles.index') }}" class="btn btn-light">{{ __('Cancel') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection