@extends('layouts.admin')

@section('title', $rat->name)
@section('page_title', 'Rat Profile: ' . $rat->name)

@section('content')
    @php
    $images = $rat->attachments->sortByDesc('created_at');
@endphp

{{-- ========================= --}}
{{-- 🖼 IMAGE STRIP --}}
{{-- ========================= --}}
@if($images->count())
    <div class="mb-6">
        <div class="flex gap-3 overflow-x-auto pb-2">
            @foreach($images->take(6) as $img)
                <img
                    src="{{ asset($img->file_path) }}"
                    class="h-24 w-24 object-cover border shadow-sm flex-shrink-0 hover:scale-105 transition"
                    alt="Rat image"
                >
            @endforeach
        </div>
    </div>
@endif


{{-- ========================= --}}
{{-- 🟢 DASHBOARD CARDS --}}
{{-- ========================= --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

    {{-- BASIC INFO --}}
    <div class="bg-white p-4 shadow border">
        <h2 class="font-bold mb-3">Basic Info</h2>

        <p><strong>Sex:</strong> {{ $rat->sex }}</p>
        <p><strong>DOB:</strong> {{ $rat->dob ?? 'Unknown' }}</p>
        <p><strong>DOD:</strong> {{ $rat->dod ?? 'Alive' }}</p>
        <p><strong>Variety:</strong> {{ $rat->variety }}</p>
        <p><strong>Color:</strong> {{ $rat->color }}</p>
        <p><strong>Markings:</strong> {{ $rat->markings }}</p>
    </div>

    {{-- LINEAGE --}}
    <div class="bg-white p-4 shadow border">
        <h2 class="font-bold mb-3">Lineage</h2>

        <p><strong>Sire:</strong> {{ $rat->sire->name ?? 'Unknown' }}</p>
        <p><strong>Dam:</strong> {{ $rat->dam->name ?? 'Unknown' }}</p>

        @if($rat->sire || $rat->dam)
            <p class="text-sm text-gray-500 mt-2">Pedigree available</p>
        @endif
    </div>

    {{-- BREEDER --}}
    <div class="bg-white p-4 shadow border">
        <h2 class="font-bold mb-3">Breeder</h2>

        <p>{{ $rat->breeder->rattery ?? 'Unknown' }}</p>
        <p class="text-sm text-gray-500">
            {{ $rat->breeder->owner_name ?? '' }}
        </p>
    </div>

    {{-- HEALTH --}}
    <div class="bg-white p-4 shadow border">
        <h2 class="font-bold mb-3">Health</h2>

        <p><strong>Records:</strong> {{ $rat->healthRecords->count() }}</p>
        <p><strong>Deformities:</strong> {{ $rat->deformities ?? 'None' }}</p>
        <p><strong>Abnormalities:</strong> {{ $rat->abnormalities ?? 'None' }}</p>
    </div>

    {{-- TEMPERAMENT --}}
    <div class="bg-white p-4 shadow border">
        <h2 class="font-bold mb-3">Temperament</h2>

        <p><strong>Assessments:</strong> {{ $rat->temperamentAssessments->count() }}</p>
        <p class="text-sm text-gray-500">
            Behavioral tracking history available
        </p>
    </div>

</div>


{{-- ========================= --}}
{{-- 🔵 TIMELINE --}}
{{-- ========================= --}}
<div class="bg-white p-6 shadow border">

    <h2 class="font-bold text-lg mb-4">Timeline</h2>

    {{-- WEIGHTS --}}
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


    {{-- HEALTH EVENTS --}}
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


    {{-- TEMPERAMENT --}}
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