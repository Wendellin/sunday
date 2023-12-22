@extends('layouts.backend.index')
@section('title') {{ $user->name }} @endsection

@section('content')

Show patient details

<strong>{{ $user->name }}</strong>

@endsection
