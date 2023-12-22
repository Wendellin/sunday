@extends('layouts.authentication.index')
@section('title', 'Reset Password')

@section('content')
<div class="col-md-6 position-relative">
    <div class="sign-in-from">
        <h1 class="mb-0">Reset Password</h1>
        <form class="mt-4" method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control mb-0 @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control mb-0 @error('password') is-invalid @enderror" id="password" placeholder=".........." name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" class="form-control mb-0" id="password-confirm" placeholder=".........." name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="d-inline-block w-100">
                <button type="submit" class="btn btn-primary float-right">Reset Password</button>
            </div>
        </form>
    </div>
</div>
@endsection
