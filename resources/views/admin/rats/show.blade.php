@extends('layouts.admin')

@section('title', $rat->name)
@section('page_title', 'Rat Profile: ' . $rat->name)

@section('content')

@php
$latestImage = $rat->attachments->sortByDesc('created_at')->first();
@endphp

<div class="bg-white p-6 shadow-md">

    <div class="container mx-auto p-4">

        {{-- Back Navigation --}}
        <div class="mb-6 flex justify-between items-center">

            <a href="{{ route('admin.rats.index') }}"
                class="text-blue-600 hover:underline">
                ← Back to Rats
            </a>

            <a href="{{ route('admin.rats.edit', $rat) }}"
                class="bg-emerald-500 hover:bg-emerald-800 text-white font-bold py-2 px-4">
                Edit Rat
            </a>

        </div>

        {{-- HERO SECTION --}}
        <div class="bg-gray-50 p-6 border mb-6">


            <h2 class="text-2xl font-bold">{{ $rat->name }}</h2>

            @if($rat->registered_name)
            <p class="text-gray-600 italic">{{ $rat->registered_name }}</p>
            @endif

            <div class="mt-3 grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">

                <div>
                    <span class="font-semibold">Sex:</span>
                    {{ $rat->sex }}
                </div>

                <div>
                    <span class="font-semibold">DOB:</span>
                    {{ $rat->dob ?? '—' }}
                </div>

                <div>
                    <span class="font-semibold">Status:</span>
                    @if($rat->dod)
                    <span class="text-red-600">Deceased</span>
                    @else
                    <span class="text-green-600">Alive</span>
                    @endif
                </div>

                <div>
                    <span class="font-semibold">Owned:</span>
                    {{ $rat->is_owned ? 'Yes' : 'No' }}
                </div>

            </div>

        </div>

        @if($latestImage)
    <div class="mb-6 border bg-gray-50 p-4 flex justify-center">
        <img
            src="{{ asset($latestImage->file_path) }}"
            alt="{{ $rat->name }}"
            class="max-h-80 object-contain border shadow-sm"
        >
    </div>
@else
    <div class="mb-6 border bg-gray-50 p-6 text-center text-gray-500">
        No images uploaded yet
    </div>
@endif

        {{-- MAIN GRID --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- BASIC INFO --}}
            <div class="border p-4">
                <h3 class="font-bold mb-2">Basic Info</h3>

                <p><strong>Variety:</strong> {{ $rat->variety }}</p>
                <p><strong>Color:</strong> {{ $rat->color }}</p>
                <p><strong>Markings:</strong> {{ $rat->markings }}</p>
                <p><strong>Eye Color:</strong> {{ $rat->eye_color }}</p>
                <p><strong>Ear Set:</strong> {{ $rat->ear_set }}</p>
                <p><strong>Silvered:</strong> {{ $rat->silvered ?? '—' }}</p>
            </div>

            {{-- BREEDER + LINEAGE --}}
            <div class="border p-4">
                <h3 class="font-bold mb-2">Lineage</h3>

                <p>
                    <strong>Breeder:</strong>
                    {{ $rat->breeder->rattery ?? '—' }}
                </p>

                <p>
                    <strong>Sire ID:</strong>
                    {{ $rat->sire_id ?? '—' }}
                </p>

                <p>
                    <strong>Dam ID:</strong>
                    {{ $rat->dam_id ?? '—' }}
                </p>

                <p class="mt-2 text-sm text-gray-500">
                    (We will later expand this into full pedigree trees)
                </p>
            </div>

            {{-- QUICK HEALTH --}}
            <div class="border p-4">
                <h3 class="font-bold mb-2">Health Snapshot</h3>

                <p><strong>Deformities:</strong></p>
                <p class="text-sm text-gray-600">{{ $rat->deformities ?? '—' }}</p>

                <p class="mt-2"><strong>Abnormalities:</strong></p>
                <p class="text-sm text-gray-600">{{ $rat->abnormalities ?? '—' }}</p>

                <p class="mt-2"><strong>Temperament Notes:</strong></p>
                <p class="text-sm text-gray-600">{{ $rat->temperament ?? '—' }}</p>
            </div>

        </div>

        {{-- SECOND ROW --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

            {{-- WEIGHTS (future chart-ready) --}}
            <div class="border p-4">
                <h3 class="font-bold mb-2">Weight History</h3>

                @if($rat->weights && $rat->weights->count())
                <ul class="text-sm">
                    @foreach($rat->weights->sortByDesc('recorded_at') as $weight)
                    <li>
                        {{ $weight->recorded_at }} — {{ $weight->weight }}g
                    </li>
                    @endforeach
                </ul>
                @else
                <p class="text-sm text-gray-500">No weight records yet.</p>
                @endif
            </div>

            {{-- HEALTH RECORDS --}}
            <div class="border p-4">
                <h3 class="font-bold mb-2">Health Records</h3>

                @if($rat->healthRecords && $rat->healthRecords->count())
                <ul class="text-sm space-y-2">
                    @foreach($rat->healthRecords as $record)
                    <li>
                        <strong>{{ $record->diagnosis }}</strong>
                        <br>
                        <span class="text-gray-500">
                            {{ $record->onset_date }} → {{ $record->resolved_date ?? 'Ongoing' }}
                        </span>
                    </li>
                    @endforeach
                </ul>
                @else
                <p class="text-sm text-gray-500">No health records yet.</p>
                @endif
            </div>

        </div>

        {{-- IMAGES --}}
        <div class="border p-4 mt-6">
            <h3 class="font-bold mb-2">Images</h3>

            @if($rat->attachments && $rat->attachments->count())
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($rat->attachments as $image)
                <img src="{{ asset($image->file_path) }}"
                    class="w-full h-32 object-cover border">
                @endforeach
            </div>
            @else
            <p class="text-sm text-gray-500">No images uploaded.</p>
            @endif
        </div>

    </div>
</div>
@endsection