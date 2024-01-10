
@extends('layouts.app', [
    'title' => 'Register'
])


@section('content')

<!-- Register-section start -->
<div class="login-section">
    <div class="login_content-form-sec">
        <div class="login_header text-center">
            <img src="img/logo/logo.svg" alt="logo">
            <h2>{{ __('Register') }}</h2>
            <p>Already have an account <span><a href="#">Login!</a></span></p>
        </div>
        <form class="singup-form-sec" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group email">
                <input id="name" type="text" placeholder="John Deo" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                <label for="name" class="lab-style">{{ __('Name') }}</label>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group email">
                <input id="email" type="email" placeholder="loremipsum@gmail.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                <label for="email" class="lab-style">{{ __('Email Address') }}</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group password">
                <input id="password" type="password" placeholder="6 + strong character" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                <label for="password" class="lab-style">{{ __('Password') }}</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group password">
                <input id="password-confirm" type="password" placeholder="6 + strong character" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <label for="password-confirm" class="lab-style">{{ __('Confirm Password') }}</label>
            </div>
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">Remember Me </label>
            </div>
            <div class="form-group login-submit">
                <button type="submit" class="btn btn-primary" value="Register">
                    {{ __('Register') }}
                </button>
            </div>  
        </form>
    </div>
</div>
<!-- Register-section end -->
@endsection