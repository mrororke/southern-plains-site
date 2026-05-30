@extends('layouts.admin')

@section('title', $rat->name)
@section('page_title', 'Rat Profile: ' . $rat->name)

@section('content')

@php
    $primaryImage = $rat->attachments->sortByDesc('created_at')->first();
    $breeder = $rat->breeder;
@endphp

{{-- HERO --}}
<div class="bg-white shadow border p-6 mb-6">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- COLUMN 1: IMAGE --}}
        <div>

            @if($primaryImage)
                <img
                    src="{{ asset($primaryImage->file_path) }}"
                    alt="{{ $primaryImage->caption ?? $rat->name }}"
                    class="w-64 h-64 object-cover border shadow-sm rounded"
                >
            @else
                <div class="w-64 h-64 bg-gray-100 border flex items-center justify-center text-gray-400 rounded">
                    No Image Available
                </div>
            @endif

        </div>

        {{-- COLUMN 2: RAT DETAILS --}}
        <div>

            <h1 class="text-3xl font-bold">
                {{ $rat->name }}
            </h1>

            @if($rat->registered_name)
                <p class="text-lg text-gray-600">
                    {{ $rat->registered_name }}
                </p>
            @endif

            <div class="mt-6 space-y-2">

                <p><strong>Sex:</strong> {{ $rat->sex }}</p>
                <p><strong>Variety:</strong> {{ $rat->variety }}</p>
                <p><strong>Color:</strong> {{ $rat->color }}</p>
                <p><strong>Markings:</strong> {{ $rat->markings }}</p>
                <p><strong>Eye Color:</strong> {{ $rat->eye_color }}</p>
                <p><strong>Ear Set:</strong> {{ $rat->ear_set }}</p>

            </div>

        </div>

        {{-- COLUMN 3: STATUS / BREEDER --}}
        <div>

            <h2 class="font-semibold text-lg mb-4">
                Quick Info
            </h2>

            <div class="space-y-2">

                <p>
                    <strong>Status:</strong>
                    {{ $rat->dod ? 'Deceased' : 'Alive' }}
                </p>

                <p>
                    <strong>DOB:</strong>
                    {{ $rat->dob ?? 'Unknown' }}
                </p>

                @if($rat->dod)
                    <p>
                        <strong>DOD:</strong>
                        {{ $rat->dod }}
                    </p>
                @endif

                @if($rat->breeder_reference)
                    <p>
                        <strong>Breeder Reference Number:</strong>
                        {{ $rat->breeder_reference }}
                    </p>
                @endif

            </div>

            @if($breeder)

                <div class="relative inline-block group mt-6">
                    <strong>Bred By: </strong>

                    <a
                        href="{{ $breeder->url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-blue-600 hover:text-blue-800 underline"
                    >
                        {{ $breeder->rattery }}
                    </a>
                    @if($breeder->owner_name)
                            <p class="mt-2">
                                <strong>Owner:</strong>
                                {{ $breeder->owner_name }}
                            </p>
                        @endif

                        @if($breeder->location)
                            <p>
                                <strong>Location:</strong>
                                {{ $breeder->location }}
                            </p>
                        @endif

                        @if($breeder->url)
                            <div class="mt-3">
                                <a
                                    href="{{ $breeder->website }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="underline"
                                >
                                    Visit Website
                                </a>
                            </div>
                        @endif

                    <div
                        class="absolute right-0 top-full mt-2 w-72 bg-white border shadow-lg rounded p-4
                               opacity-0 invisible group-hover:opacity-100 group-hover:visible
                               transition-all duration-200 z-50"
                    >

                        <h3 class="font-semibold">
                            {{ $breeder->rattery }}
                        </h3>

                        @if($breeder->owner_name)
                            <p class="mt-2">
                                <strong>Owner:</strong>
                                {{ $breeder->owner_name }}
                            </p>
                        @endif

                        @if($breeder->location)
                            <p>
                                <strong>Location:</strong>
                                {{ $breeder->location }}
                            </p>
                        @endif

                        @if($breeder->url)
                            <div class="mt-3">
                                <a
                                    href="{{ $breeder->url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="text-blue-600 underline"
                                >
                                    Visit Website
                                </a>
                            </div>
                        @endif

                    </div>

                </div>

            @endif

        </div>

    </div>

</div>


{{-- PEDIGREE PLACEHOLDER --}}
<div class="bg-white shadow border p-6 mb-6">

    <h2 class="text-xl font-semibold mb-4">
        Pedigree
    </h2>

    <div class="border-2 border-dashed border-gray-300 p-10 text-center text-gray-500">

        Pedigree visualization coming soon.

    </div>

</div>

{{-- TIMELINE --}}
<div class="bg-white shadow border p-6">

    <h2 class="text-xl font-semibold mb-6">
        Timeline
    </h2>

    @if($rat->weights->count())
        <div class="mb-6">

            <h3 class="font-semibold mb-2">
                Weight History
            </h3>

            <ul class="space-y-1">
                @foreach($rat->weights->sortByDesc('recorded_at')->take(10) as $weight)
                    <li>
                        {{ $weight->recorded_at }} — {{ $weight->weight }} g
                    </li>
                @endforeach
            </ul>

        </div>
    @endif

    @if($rat->healthRecords->count())
        <div class="mb-6">

            <h3 class="font-semibold mb-2">
                Health Records
            </h3>

            <ul class="space-y-1">
                @foreach($rat->healthRecords->sortByDesc('onset_date')->take(10) as $record)
                    <li>
                        {{ $record->onset_date }} — {{ $record->diagnosis }}
                    </li>
                @endforeach
            </ul>

        </div>
    @endif

    @if($rat->temperamentAssessments->count())

        <div>

            <h3 class="font-semibold mb-2">
                Temperament Assessments
            </h3>

            <ul class="space-y-1">
                @foreach($rat->temperamentAssessments->sortByDesc('date')->take(10) as $assessment)
                    <li>
                        {{ $assessment->date }} — Assessment Recorded
                    </li>
                @endforeach
            </ul>

        </div>

    @endif

</div>

@endsection