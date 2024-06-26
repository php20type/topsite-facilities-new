@extends('layouts.app', [
    'title' => 'Register',
])


@section('content')
    <!-- Register-section start -->
    <div class="login-section">
        <div class="login_content-form-sec">
            <div class="login_header text-center">
                <img src="{{ URL::asset('img/logo/logo.svg') }}" alt="logo">
                <h2 class="card-header"> {{ isset($url) ? ucwords($url) : '' }} {{ __('Register') }}</h2>
                <p>Already have an account <span><a href="{{ route('customerlogin') }}">Login!</a></span></p>
            </div>
            @isset($url)
                <form class="singup-form-sec" method="POST" action="{{ url("register/$url") }}" aria-label="{{ __('Register') }}">
                @else
                    <form class="singup-form-sec" method="POST" action="{{ route('CreateUser') }}"
                        aria-label="{{ __('Register') }}">
                    @endisset
                    @csrf
                    <div class="form-group email">
                        <input id="name" type="text" placeholder="John Deo"
                            class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <label for="name" class="lab-style">{{ __('Name') }}</label>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group email">
                        <input id="email" type="email" placeholder="loremipsum@gmail.com"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">
                        <label for="email" class="lab-style">{{ __('Email Address') }}</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group password">
                        <input id="password" type="password" placeholder="6 + strong character"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">
                        <label for="password" class="lab-style">{{ __('Password') }}</label>
                        <span toggle="#password" class="eye-toggle fas fa-eye-slash field-icon toggle-password" onclick="togglePasswordVisibility('#password')"></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group password">
                        <input id="password-confirm" type="password" placeholder="6 + strong character" class="form-control"
                            name="password_confirmation" required autocomplete="new-password">
                        <label for="password-confirm" class="lab-style">{{ __('Confirm Password') }}</label>
                        <span toggle="#password-confirm" class="eye-toggle fas fa-eye-slash field-icon toggle-password" onclick="togglePasswordVisibility('#password-confirm')"></span>
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
@section('page_scripts')
<script>
    function togglePasswordVisibility(target) {
        const passwordInput = document.querySelector(target);
        const icon = document.querySelector('[toggle="' + target + '"]'); // Find the icon with the corresponding toggle attribute

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        }
    }
</script>
@endsection