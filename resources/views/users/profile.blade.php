@extends('layouts.app')

@section('content')
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">User Profile</h4>
                    &nbsp;
                    <div class="table-responsive">
                        <table class="table no-wrap">
                            <tbody>
                            <tr>
                                <td class="text-gray">Name</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Created At</td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Updated At</td>
                                <td>{{ $user->updated_at }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('users.profile', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">{{ __('Current Password') }}</label>
                            <input type="password" name="current_password" id="current_password"
                                   class="form-control form-control-lg @error('current_password') is-invalid @enderror"
                                   placeholder="{{ __('Current Password') }}"/>
                            @error('current_password')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">{{ __('New Password') }}</label>
                            <input type="password" name="new_password" id="new_password" value=""
                                   class="form-control form-control-lg @error('new_password') is-invalid @enderror"
                                   autocomplete="new_password" placeholder="{{ __('New password') }}"/>
                            @error('new_password')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">{{ __('Confirm Password') }}</label>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" value=""
                                   class="form-control form-control-lg @error('new_password_confirmation') is-invalid @enderror"
                                   placeholder="{{ __('Confirm password') }}"/>
                            @error('new_password')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success mr-2">
                            <i class="mdi mdi-plus"></i> {{ __('Update') }}
                        </button>
                        <a href="{{ route('users.index') }}" class="btn btn-light">{{ __('Cancel') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection