@extends('admin.dashboard-v2.desktop')

@section('content')
    <div class="dashboard-content">
        <div class="py-4">
        <img src="{{ asset('images/headers/dashboard.png') }}" alt="Dashboard Header" class="rounded-md">
    </div>
        <h1>Dashboard</h1>

        <x-admin.inbox />
    </div>
@endsection