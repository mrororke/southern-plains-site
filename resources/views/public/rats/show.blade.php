@extends('layouts.app')

@section('title', $rat->registered_name ?? $rat->name)

@section('content')

@php
    $primaryImage = $rat->attachments->sortByDesc('created_at')->first();
@endphp

<div class="max-w-4xl mx-auto p-6">

    {{-- HEADER --}}
    <div class="mb-6">

        <h1 class="text-2xl font-bold">
            {{ $rat->registered_name ?? $rat->name }}
        </h1>

        @if($rat->registered_name)
            <div class="text-gray-600">
                {{ $rat->name }}
            </div>
        @endif

    </div>

    {{-- IMAGE --}}
    @if($primaryImage)
        <img
            src="{{ asset($primaryImage->file_path) }}"
            alt="{{ $primaryImage->caption ?? $rat->name }}"
            class="w-full max-w-md rounded border mb-6"
        >
    @endif

    {{-- BASIC INFO --}}
    <div class="text-sm space-y-2">

        <div>
            <strong>Sex:</strong> {{ $rat->sex }}
        </div>

        <div>
            <strong>Variety:</strong> {{ $rat->variety }}
        </div>

        <div>
            <strong>Color:</strong>
            {{ $rat->colors->pluck('name')->join(', ') ?: 'Unknown' }}
        </div>

        <div>
            <strong>Markings:</strong>
            {{ $rat->markings->pluck('name')->join(', ') ?: 'None' }}
        </div>

        <div>
            <strong>Status:</strong>
            {{ $rat->dod ? 'Deceased' : 'Living' }}
        </div>

    </div>

</div>

@endsection