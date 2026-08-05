@extends('admin.dashboard-v2.desktop')

@section('content')
    <div class="dashboard-content">
        <div class="py-4">
        <img src="{{ asset('images/headers/dashboard.jpg') }}" alt="Hamish, a shetland sheepdog, running across a field." class="rounded-md">
    </div>
        <h1 class="font-sans text-sp-charcoal font-semibold text-6xl">Dashboard</h1>

        <x-admin.inbox />
    </div>
@endsection