@extends('layouts.auth')

@section('content')

    <div class="auth-form-light text-left p-5">
        <div class="brand-logo">
            <img src="{{ asset('images/wacha.jpg') }}">
        </div>
        <h4>Hello! let's get started</h4>
        <h6 class="font-weight-light">Sign in to continue.</h6>
        <form method="POST" action="{{ route('login') }}" class="pt-3">
            @csrf
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
                       required autocomplete="current-password" placeholder="{{ __('Password') }}" />
                @error('password')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">
                    {{ __('SIGN IN') }}
                </button>
            </div>
            <div class="my-2 d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        {{ __('Keep me signed in') }}
                    </label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="auth-link text-black">{{ __('Forgot Your Password?') }}</a>
                @endif
            </div>
            <div class="text-center mt-4 font-weight-light">
                {{ __("Don't have an account?") }} <a href="{{ route('register') }}" class="text-primary">{{ __('Create') }}</a>
            </div>
        </form>
    </div>

@endsection
