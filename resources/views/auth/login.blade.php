@extends('layouts.app', [
    'title' => 'Login'
])

@section('content')

<!-- login-section start -->
<div class="login-section">
    <div class="login_content-form-sec">
        <div class="login_header text-center">
            <img src="img/logo/logo.svg" alt="logo"> 
            <h2>{{ __('Login') }}</h2>
            <p>Need an account? <span><a href="#">Get started!</a></span></p>
        </div>
        <form class="singup-form-sec" method="POST" action="{{ route('user.login') }}">
            @csrf
            <div class="form-group email">
                <input id="email" type="email" placeholder="loremipsum@gmail.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <label for="email" class="lab-style">{{ __('Email Address') }}</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group password">
                <input id="password" type="password" placeholder="6 + strong character" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <label for="password" class="lab-style">{{ __('Password') }}</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" name="remember" value="" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <div class="form-group login-submit">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>            
            </div>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </form>
   </div>
 </div>
<!-- login-section end -->
@endsection