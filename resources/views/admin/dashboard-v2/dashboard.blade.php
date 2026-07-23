@extends('admin.dashboard-v2.desktop')

@section('title', 'Dashboard')

@section('content')

    <div class="py-4">
        <img src="{{ asset('images/headers/dashboard.png') }}" alt="Dashboard Header" class="rounded-md">
    </div>

    <x-admin.inbox />

@endsection
