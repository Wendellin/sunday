@extends('layouts.authentication.index')
@section('title', 'Sign Up')

@section('content')

<div class="col-md-6 position-relative">
    <div class="sign-in-from">
        <h1 class="mb-0">Reset Password</h1>
        <p>Enter your email address and we'll send you an email with instructions to reset your password.</p>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        <form class="mt-4" method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control mb-0 @error('email') is-invalid @enderror" id="email" placeholder="Enter your email address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-inline-block w-100">

                <button type="submit" class="btn btn-primary float-right">Reset Password</button>
            </div>

        </form>
    </div>
</div>

@endsection
