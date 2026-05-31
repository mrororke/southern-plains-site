@extends('layouts.admin')

@section('title', $rat->name)
@section('page_title', 'Rat Profile: ' . $rat->name)

@section('content')

@php
$primaryImage = $rat->attachments->sortByDesc('created_at')->first();
$breeder = $rat->breeder;

$age = $rat->dob
? \Carbon\Carbon::parse($rat->dob)->diff(now())
: null;

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
                class="w-64 h-64 object-cover border shadow-sm">
            @else
            <div class="w-64 h-64 bg-gray-100 border flex items-center justify-center text-gray-400">
                No Image Available
            </div>
            @endif

        </div>

        {{-- COLUMN 2: RAT DETAILS --}}

        <div class="grid grid-cols-2 gap-x-6 gap-y-3 text-sm">
            <div>
                <div class="text-gray-500 uppercase tracking-wide text-xs">Date of Birth</div>
                <div>
                    {{ $rat->dob ? \Carbon\Carbon::parse($rat->dob)->format('F j, Y') : 'Unknown' }}<br />
                    @if($age)
                    <span class="text-gray-500 italic">
                        @php
                        $parts = [];

                        if ($age->y) {
                        $parts[] = $age->y . ' year' . ($age->y != 1 ? 's' : '');
                        }

                        if ($age->m) {

                        $parts[] = $age->m . ' month' . ($age->m != 1 ? 's' : '');

                        }

                        if (!$age->y && !$age->m) {
                        $parts[] = 'Under 1 month';
                        }
                        @endphp

                        {{ implode(', ', $parts) }}

                        @else

                        Unknown

                        @endif
                    </span>
                </div>
            </div>

            <div>
                <div class="text-gray-500 uppercase tracking-wide text-xs">Sex</div>
                <div>{{ $rat->sex }}</div>
            </div>



            <div>
                <div class="text-gray-500 uppercase tracking-wide text-xs">Variety</div>
                <div>{{ $rat->variety }}</div>
            </div>

            <div>
                <div class="text-gray-500 uppercase tracking-wide text-xs">Color</div>
                <div>{{ $rat->colors->isNotEmpty()
    ? $rat->colors->pluck('name')->join(', ')
    : 'Unknown'
}}
                </div>
            </div>

            <div>
                <div class="text-gray-500 uppercase tracking-wide text-xs">Markings</div>
                <div>
                    {{ $rat->markings->isNotEmpty()
    ? $rat->markings->pluck('name')->join(', ')
    : 'None'
}}
                </div>
            </div>
            <div>
                <div class="text-gray-500 uppercase tracking-wide text-xs">Status</div>
                <div>{{ $rat->dod ? 'Deceased' : 'Living' }}</div>
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
<div class="bg-white shadow border p-6">

    <h2 class="text-lg font-semibold mb-4">
        Pedigree
    </h2>

    <TABLE BORDER="1" WIDTH="100%" CELLPADDING="3" CELLSPACING="3">

        <TBODY>

            <TR>

                <TD rowspan="4" width="29%">Father</TD>

                <TD rowspan="2" width="32%">Paternal Grandfather</TD>

                <TD width="39%">Paternal Great Grandfather 1</TD>

            </TR>

            <TR>

                <TD width="39%">Paternal Great Grandmother 1</TD>

            </TR>

            <TR>

                <TD rowspan="2" width="32%">Paternal Grandmother</TD>

                <TD width="39%">Paternal Great Grandfather 2</TD>

            </TR>

            <TR>

                <TD width="39%">Paternal Great Grandmother 2</TD>

            </TR>

            <TR>

                <TD rowspan="4" width="29%">Mother</TD>

                <TD rowspan="2" width="32%">Maternal Grandfather</TD>

                <TD width="39%">Maternal Great Grandfather 1</TD>

            </TR>

            <TR>

                <TD width="39%">Maternal Great Grandmother 1</TD>

            </TR>

            <TR>

                <TD rowspan="2" width="32%">Maternal Grandmother</TD>

                <TD width="39%">Maternal Great Grandfather 2</TD>

            </TR>

            <TR>

                <TD width="39%">Maternal Great Grandmother 2</TD>

            </TR>

        </TBODY>

    </TABLE>

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