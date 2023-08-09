<!-- resources/views/dashboard.blade.php -->

@extends('layouts.dash')

@section('content')
    <h1 class="mt-4">Welcome to the Dashboard</h1>
    <p>Hello, {{ Auth::user()->name }}!</p>
    <p>You are now logged in to the Permission Management System as an administrator.</p>
@endsection
