@extends('admin.dashboard-v2.desktop')

@section('content')
    <div class="dashboard-content">
        <div class="py-4">
        <img src="{{ asset('images/headers/dashboard.png') }}" alt="Hamish, a shetland sheepdog, running across a field." class="rounded-sm">
    </div>
        <h1 class="font-heading text-sp-charcoal text-7xl">Dashboard</h1>

        <x-admin.inbox />
    </div>
@endsection