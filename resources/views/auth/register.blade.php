@extends('layouts.auth')

@section('content')
    <div class="auth-form-light text-left p-5">
        <div class="brand-logo">
            <img src="{{ asset('images/ufza-logo.jpg') }}">
        </div>
        <h4>New here?</h4>
        <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
        <form method="POST" action="{{ route('register') }}" class="pt-3">
            @csrf
            <div class="form-group">
                <input type="text" name="name" id="name" required autocomplete="name" autofocus
                       class="form-control form-control-lg @error('name') is-invalid @enderror"
                       value="{{ old('name') }}" placeholder="{{ __('Name') }}" />
                @error('name')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" required autocomplete="email" autofocus
                       class="form-control form-control-lg @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" />
                @error('email')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password"
                       class="form-control form-control-lg @error('password') is-invalid @enderror"
                       required autocomplete="new-password" placeholder="{{ __('Password') }}" />
                @error('password')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" id="password-confirm"
                       class="form-control form-control-lg" required autocomplete="new-password"
                       placeholder="{{ __('Confirm Password') }}" />
            </div>
            <button type="submit" class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">
                {{ __('REGISTER') }}
            </button>
            <div class="text-center mt-4 font-weight-light">
                {{ __('Already have an account?') }} <a href="{{ route('login') }}" class="text-primary">{{ __('Login') }}</a>
            </div>
        </form>
    </div>
@endsection
