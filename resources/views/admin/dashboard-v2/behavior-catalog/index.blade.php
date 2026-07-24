@extends('admin.dashboard-v2.desktop')

@section('content')
    <div class="dashboard-content">
        <div class="py-4">
        <img src="{{ asset('images/headers/header-behavior-catalog.jpg') }}" alt="Hamish, a Shetland Sheepdog, at a quarry box." class="rounded-md">
    </div class="flex justify-between items-center mb-6">
        <h1 class="font-heading text-4xl">Behavior Catalog</h1>
        <a href="{{ route('admin.trick-catalog.create') }}"
        class="inline-flex items-center px-4 py-2 text-xs uppercase bg-training text-white">
        + New Behavior
    </a>

    </div>
@endsection