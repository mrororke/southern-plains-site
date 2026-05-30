@extends('layouts.admin')

@section('title', $rat->name)
@section('page_title', 'Rat Profile: ' . $rat->name)

@section('content')

{{-- ========================= --}}
{{-- HERO SECTION --}}
{{-- ========================= --}}

@php
    $primaryImage = $rat->attachments->sortByDesc('created_at')->first();
    $breeder = $rat->breeder;
@endphp

<div class="bg-white shadow border p-6 mb-6">

    <div class="flex flex-col md:flex-row gap-6">

        {{-- ========================= --}}
        {{-- IMAGE (LEFT) --}}
        {{-- ========================= --}}
        <div class="md:w-1/3">
            @if($primaryImage)
                <img
                    src="{{ asset($primaryImage->file_path) }}"
                    alt="{{ $primaryImage->caption ?? $rat->name }}"
                    class="w-full h-72 object-cover border shadow-sm"
                >
            @else
                <div class="w-full h-72 bg-gray-100 border flex items-center justify-center text-gray-400">
                    No image
                </div>
            @endif
        </div>

        {{-- ========================= --}}
        {{-- INFO (RIGHT) --}}
        {{-- ========================= --}}
        <div class="md:w-2/3 flex flex-col justify-between">

            <div>

                {{-- NAME --}}
                <h1 class="text-2xl font-bold">
                    {{ $rat->name }}
                </h1>

                {{-- REGISTERED NAME (ONLY IF EXISTS) --}}
                @if($rat->registered_name)
                    <p class="text-gray-600">
                        {{ $rat->registered_name }}
                    </p>
                @endif

                {{-- CORE INFO --}}
                <div class="mt-3 text-sm text-gray-700 space-y-1">
                    <p><strong>Sex:</strong> {{ $rat->sex }}</p>
                    <p><strong>Variety:</strong> {{ $rat->variety }}</p>
                    <p><strong>Color:</strong> {{ $rat->color }}</p>
                    <p><strong>DOB:</strong> {{ $rat->dob ?? 'Unknown' }}</p>
                    <p>
                        <strong>Status:</strong>
                        {{ $rat->dod ? 'Deceased' : 'Alive' }}
                    </p>
                </div>

            </div>

            {{-- ========================= --}}
            {{-- BREEDER (TOOLTIP + LINK) --}}
            {{-- ========================= --}}
            <div class="mt-4 text-sm text-gray-600">

                @if($breeder)
                    <a href="{{ $breeder->url }}"
           target="_blank"
           rel="noopener noreferrer"
           class="underline hover:text-black"
           title="{{ $breeder->rattery }}
Owner: {{ $breeder->owner_name ?? 'Unknown' }}
Location: {{ $breeder->location ?? 'Unknown' }}">

                        Breeder: {{ $breeder->rattery }}

                    </a>
                @else
                    <span>Breeder: Unknown</span>
                @endif

            </div>

        </div>
    </div>

</div>

{{-- ========================= --}}
{{-- DASHBOARD CARDS --}}
{{-- ========================= --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

    <div class="bg-white p-4 shadow border">
        <h2 class="font-bold mb-3">Basic Info</h2>

        <p><strong>Sex:</strong> {{ $rat->sex }}</p>
        <p><strong>DOB:</strong> {{ $rat->dob ?? 'Unknown' }}</p>
        <p><strong>DOD:</strong> {{ $rat->dod ?? 'Alive' }}</p>
        <p><strong>Variety:</strong> {{ $rat->variety }}</p>
        <p><strong>Color:</strong> {{ $rat->color }}</p>
        <p><strong>Markings:</strong> {{ $rat->markings }}</p>
    </div>

    <div class="bg-white p-4 shadow border">
        <h2 class="font-bold mb-3">Lineage</h2>

        <p><strong>Sire:</strong> {{ $rat->sire->name ?? 'Unknown' }}</p>
        <p><strong>Dam:</strong> {{ $rat->dam->name ?? 'Unknown' }}</p>
    </div>

    <div class="bg-white p-4 shadow border">
        <h2 class="font-bold mb-3">Breeder</h2>

        <p>{{ $rat->breeder->rattery ?? 'Unknown' }}</p>
        <p class="text-sm text-gray-500">
            {{ $rat->breeder->owner_name ?? '' }}
        </p>
    </div>

    <div class="bg-white p-4 shadow border">
        <h2 class="font-bold mb-3">Health</h2>

        <p><strong>Records:</strong> {{ $rat->healthRecords->count() }}</p>
        <p><strong>Deformities:</strong> {{ $rat->deformities ?? 'None' }}</p>
        <p><strong>Abnormalities:</strong> {{ $rat->abnormalities ?? 'None' }}</p>
    </div>

    <div class="bg-white p-4 shadow border">
        <h2 class="font-bold mb-3">Temperament</h2>

        <p><strong>Assessments:</strong> {{ $rat->temperamentAssessments->count() }}</p>
    </div>

</div>

{{-- ========================= --}}
{{-- TIMELINE --}}
{{-- ========================= --}}
<div class="bg-white p-6 shadow border">

    <h2 class="font-bold text-lg mb-4">Timeline</h2>

    @if($rat->weights->count())
        <h3 class="font-semibold mt-4 mb-2">Weight History</h3>
        <ul class="space-y-1 text-sm">
            @foreach($rat->weights->sortByDesc('recorded_at')->take(5) as $weight)
                <li>
                    {{ $weight->recorded_at }} — {{ $weight->weight }}g
                </li>
            @endforeach
        </ul>
    @endif

    @if($rat->healthRecords->count())
        <h3 class="font-semibold mt-6 mb-2">Health Events</h3>
        <ul class="space-y-1 text-sm">
            @foreach($rat->healthRecords->sortByDesc('onset_date')->take(5) as $record)
                <li>
                    {{ $record->onset_date }} — {{ $record->diagnosis }}
                </li>
            @endforeach
        </ul>
    @endif

    @if($rat->temperamentAssessments->count())
        <h3 class="font-semibold mt-6 mb-2">Temperament</h3>
        <ul class="space-y-1 text-sm">
            @foreach($rat->temperamentAssessments->sortByDesc('date')->take(5) as $t)
                <li>
                    {{ $t->date }} — assessment recorded
                </li>
            @endforeach
        </ul>
    @endif

</div>
@endsection