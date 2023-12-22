@extends('layouts.backend.index')
@section('title') {{ $patient->users->name }} @endsection

@section('content')

Show patient details

<strong>{{ $patient->users->name }}</strong>

@endsection
