@extends('layouts.admin')

@section('title', $rat->name)
@section('page_title', 'Rat Profile: ' . $rat->name)

@section('content')

{{-- ========================= --}}
{{-- HERO SECTION --}}
{{-- ========================= --}}
<div class="bg-white shadow border p-6 mb-6">

    <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4">

        {{-- Identity --}}
        <div>
            <h1 class="text-2xl font-bold">{{ $rat->name }}</h1>

            <p class="text-gray-600">
                {{ $rat->registered_name ?? 'No registered name' }}
            </p>

            <div class="mt-2 text-sm text-gray-700 space-y-1">
                <p><strong>Sex:</strong> {{ $rat->sex }}</p>
                <p><strong>Variety:</strong> {{ $rat->variety }}</p>
                <p><strong>Color:</strong> {{ $rat->color }}</p>
            </div>
        </div>

        {{-- Meta --}}
        <div class="text-sm text-right text-gray-600">
            <p><strong>Breeder:</strong> {{ $rat->breeder->rattery ?? 'Unknown' }}</p>
            <p><strong>DOB:</strong> {{ $rat->dob ?? 'Unknown' }}</p>
            <p>
                <strong>Status:</strong>
                {{ $rat->dod ? 'Deceased' : 'Alive' }}
            </p>
        </div>

    </div>

    {{-- ========================= --}}
    {{-- IMAGE STRIP --}}
    {{-- ========================= --}}
    @php
        $images = $rat->attachments->sortByDesc('created_at');
    @endphp

    @if($images->count())
        <div class="mt-5">
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