@extends('layouts.backend.index')
@section('title', 'HOME')

@section('content')
    Welcome {{ Auth::user()->name }} as {{ Auth::user()->roles->name }}
@endsection
