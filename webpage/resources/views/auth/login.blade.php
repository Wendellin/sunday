@extends('layouts.authentication.index')
@section('title', 'Sign In')


@section('content')
<div class="col-md-6 position-relative">
    <div class="sign-in-from">
        <h1 class="mt-1">Sign in</h1>
        <p>Enter your email address and password to access admin panel.</p>
        <form class="mt-4" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email address</label>
                <input id="email" type="email" class="form-control mb-3 @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <a href="{{ route('password.request')  }}" class="float-end">Forgot password?</a>
                <input id="password" type="password" class="form-control mb-3 @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="d-inline-block w-100">
                <div class="custom-control custom-checkbox d-inline-block mt-3 pt-1">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="customCheck1">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary float-end">Sign in</button>
            </div>
            <div class="sign-info">
                <span class="dark-color d-inline-block line-height-2">Don't have an account? <a href="{{ route('register') }}">Sign up</a></span>
            </div>
        </form>
    </div>
</div>
@endsection
