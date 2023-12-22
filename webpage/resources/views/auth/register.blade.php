@extends('layouts.authentication.index')
@section('title', 'Sign Up')

@section('content')
<div class="col-md-6 position-relative">
    <div class="sign-in-from">
        <h1 class="mb-3">Sign Up</h1>
        <form class="mt-4" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name">Your Full Name</label>
                <input type="text" class="form-control mb-3 @error('name') is-invalid @enderror" id="name" placeholder="Your Full Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                 @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control mb-3 @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control mb-3 @error('password') is-invalid @enderror" id="password" placeholder=".........." name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" class="form-control mb-3" id="password-confirm" placeholder=".........." name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="d-inline-block w-100">
                <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" @checked(true)>
                    <label class="custom-control-label" for="customCheck1">I accept <a href="#">Terms and Conditions</a></label>
                </div>
                <button type="submit" class="btn btn-primary float-right">Sign Up</button>
            </div>
            <div class="sign-info">
                <span class="dark-color d-inline-block line-height-2">Already Have Account? <a href="{{ route('login') }}">{{__('Sign In')}} </a></span>
            </div>
        </form>
    </div>
</div>
@endsection
