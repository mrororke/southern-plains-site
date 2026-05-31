@extends('layouts.admin')

@section('title', $rat->name)
@section('page_title', 'Rat Profile: ' . $rat->name)

@section('content')

@php
$primaryImage = $rat->attachments->sortByDesc('created_at')->first();
$breeder = $rat->breeder;
@endphp

{{-- HERO --}}
<div class="bg-white shadow border p-6 mb-6 items-end">
    <h1 class="font-bold text-xl mb-4">
                @if($rat->registered_name)
                    {{ $rat->registered_name }}, 
                @endif
                    {{ $rat->name }}
                </h1>
           

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- COLUMN 1: IMAGE --}}
        <div>

            @if($primaryImage)
            <img
                src="{{ asset($primaryImage->file_path) }}"
                alt="{{ $primaryImage->caption ?? $rat->name }}"
                class="w-64 h-64 object-cover border shadow-sm rounded">
            @else
            <div class="w-64 h-64 bg-gray-100 border flex items-center justify-center text-gray-400 rounded">
                No Image Available
            </div>
            @endif

        </div>

        {{-- COLUMN 2: RAT DETAILS --}}            

            <div class="grid grid-cols-2 gap-x-6 gap-y-3 text-sm">
               

                <div>
                    <div class="text-gray-500 uppercase tracking-wide text-xs">Sex</div>
                    <div>{{ $rat->sex }}</div>
                </div>

                <div>
                    <div class="text-gray-500 uppercase tracking-wide text-xs">Status</div>
                    <div>{{ $rat->dod ? 'Deceased' : 'Living' }}</div>
                </div>

                <div>
                    <div class="text-gray-500 uppercase tracking-wide text-xs">Date of Birth</div>
                    <div>
                        {{ $rat->dob ? \Carbon\Carbon::parse($rat->dob)->format('F j, Y') : 'Unknown' }}
                        $age = \Carbon\Carbon::parse($rat->dob);
                        {{ $age->diffForHumans() }}
                    </div>
                </div>

                <div>
                    <div class="text-gray-500 uppercase tracking-wide text-xs">Variety</div>
                    <div>{{ $rat->variety }}</div>
                </div>

                <div>
                    <div class="text-gray-500 uppercase tracking-wide text-xs">Color</div>
                    <div>{{ $rat->color }}</div>
                </div>

                <div>
                    <div class="text-gray-500 uppercase tracking-wide text-xs">Markings</div>
                    <div>{{ $rat->markings }}</div>
                </div>

            </div>

        {{-- COLUMN 3: STATUS / BREEDER --}}
        <div class="grid grid-cols-2 gap-x-6 gap-y-3 text-sm">
            <div>
                <div class="text-gray-500 uppercase tracking-wide text-xs">Breeder Information</div>
                <div>
                    @if($breeder)
                    <strong>{{ $breeder->rattery }}</strong><br />
                    @if($breeder->owner_name)
                    <span class="italic">{{ $breeder->owner_name }}</span><br />
                    @endif
                    @if($breeder->location)
                    <span class="italic">{{ $breeder->location }}</span><br />

                    @endif
                    @if($rat->breeder_reference)
                    <span class="text-xs">
                        <strong>Breeder Number:</strong> {{ $rat->breeder_reference }}</span><br />
                    @endif


                    @if($breeder->website)
                    <a
                        href="{{ $breeder->website }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="underline">
                        Visit Website
                    </a>
                    @endif

                    @endif
                </div>
            </div>





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