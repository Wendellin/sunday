@extends('layouts.authentication.index')
@section('title', 'Verify Email')


@section('content')
<div class="col-md-6 position-relative">
    <div class="sign-in-from">
        <img src="images/login/mail.png" width="80" alt="">
        <h1 class="mt-3 mb-0">Success !</h1>
        <p>
            A email has been send to <strong>{{ Auth::user()->email }}</strong>.
            Please check for an email from the {{ config('app.name') }} and click on the included link to confirm your password.
        </p>
        <div class="d-inline-block w-100">

                <a href="{{ route('welcome') }}" class="btn btn-primary mt-3">Back to Home</a>
            </div>
    </div>
</div>
@endsection
