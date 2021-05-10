@extends('layouts.app')

@section('content')
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('Full Name') }}</label>
                            <input type="text" name="name" id="name" required autocomplete="name" autofocus
                                   class="form-control form-control-lg @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}"/>
                            @error('name')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input type="email" name="email" id="email" required autocomplete="email" autofocus
                                   class="form-control form-control-lg @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}"/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="roles">{{ __('Roles') }}</label>

                            <select class="form-control form-control-lg @error('roles') is-invalid @enderror" id="roles"
                                    name="roles[]" size="5" multiple>
                                @foreach($roles as $role)
                                    <option value="{{ $role['id'] }}" {{ old('roles') == $role['id'] ? 'selected' : ''}}> {{ $role['name'] }}</option>
                                @endforeach
                            </select>

                            @error('roles')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-gradient-primary mr-2">
                            <i class="mdi mdi-plus"></i> {{ __('Create') }}
                        </button>
                        <a href="{{ route('users.index') }}" class="btn btn-light">{{ __('Cancel') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection