@extends('layouts.app', [
    'title' => 'Login',
])

@section('content')
    <!-- login-section start -->
    <div class="login-section">
        <div class="login_content-form-sec">
            <div class="login_header text-center">
                <img src="{{ URL::asset('img/logo/logo.svg') }}" alt="logo">
                <h2 class="card-header"> {{ isset($url) ? ucwords($url) : '' }} {{ __('Login') }}</h2>
                @if ($url != 'admin') <p>Need an account? <span><a href="{{ route('customer.register') }}">Get started!</a></span></p> @endif
            </div>
            @if ($errors->has('error'))
                <div class="alert alert-danger">
                    {{ $errors->first('error') }}
                </div>
            @endif
            {{-- @isset($url) --}}
                {{-- <form class="singup-form-sec" method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                @else --}}
                    <form class="singup-form-sec" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    {{-- @endisset --}}
                    @csrf
                    <div class="form-group email">
                        <input id="email" type="email" placeholder="loremipsum@gmail.com"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                            autocomplete="current-password">
                        <label for="password" class="lab-style">{{ __('Password') }}</label>
                        <span toggle="#password" class="eye-toggle fas fa-eye-slash field-icon toggle-password"></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <div class="form-group login-submit">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </div>
                    @if ($url != 'admin')
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    @endif
                </form>
        </div>
    </div>
    <!-- login-section end -->
@endsection
@section('page_scripts')
<script>
    $(document).ready(function() {
        $(".toggle-password").click(function() {
            // Toggle the type attribute of the password input field
            var toggleId = $(this).attr('toggle');
            var inputType = $(toggleId).attr("type");
            if (inputType === "password") {
                $(toggleId).attr("type", "text");
                $(this).removeClass('fa-eye-slash').addClass('fa-eye');
            } else {
                $(toggleId).attr("type", "password");
                $(this).removeClass('fa-eye').addClass('fa-eye-slash');
            }
        });
    });
    
</script>
@endsection