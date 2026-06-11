@php
$primaryImage = $rat->attachments->sortByDesc('created_at')->first();
$breeder = $rat->breeder;

$age = $rat->dob
? \Carbon\Carbon::parse($rat->dob)->diff(now())
: null;
@endphp

<div class="bg-white shadow border p-6 mb-6 items-end">
    <pre>
Selected Image:
ID: {{ $primaryImage?->id }}
Path: {{ $primaryImage?->file_path }}
Created: {{ $primaryImage?->created_at }}

All Attachments:
@foreach($rat->attachments->sortByDesc('created_at') as $attachment)
{{ $attachment->id }} | {{ $attachment->file_path }} | {{ $attachment->created_at }}
@endforeach
</pre>

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
            @if($primaryImage->caption)
            <div class="mt-2 text-sm text-gray-600">
                {{ $primaryImage->caption }}
            </div>
            @endif
            @else
            <div class="w-64 h-64 bg-gray-100 border flex items-center justify-center text-gray-400">
                No Image Available
            </div>
            @endif
        </div>

        {{-- COLUMN 2: DETAILS --}}
        <div class="grid grid-cols-2 gap-x-6 gap-y-3 text-sm">

            <div>
                <div class="text-gray-500 uppercase text-xs">Date of Birth</div>

                <div>
                    {{ $rat->dob ? \Carbon\Carbon::parse($rat->dob)->format('F j, Y') : 'Unknown' }}

                    <br>

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
                    </span>
                    @endif
                </div>
            </div>

            <div>
                <div class="text-gray-500 uppercase text-xs">Sex</div>
                <div>{{ $rat->sex }}</div>
            </div>

            <div>
                <div class="text-gray-500 uppercase text-xs">Variety</div>
                <div>{{ $rat->variety }}</div>
            </div>

            <div>
                <div class="text-gray-500 uppercase text-xs">Color</div>
                <div>
                    {{ $rat->colors->isNotEmpty()
                        ? $rat->colors->pluck('name')->join(', ')
                        : 'Unknown'
                    }}
                </div>
            </div>

            <div>
                <div class="text-gray-500 uppercase text-xs">Markings</div>
                <div>
                    {{ $rat->markings->isNotEmpty()
                        ? $rat->markings->pluck('name')->join(', ')
                        : 'None'
                    }}
                </div>
            </div>

            <div>
                <div class="text-gray-500 uppercase text-xs">Status</div>
                <div>{{ $rat->dod ? 'Deceased' : 'Living' }}</div>
            </div>

        </div>

        {{-- COLUMN 3: BREEDER --}}
        <div class="grid grid-cols-2 gap-x-6 gap-y-3 text-sm">

            <div>
                <div class="text-gray-500 uppercase text-xs">Breeder Information</div>

                <div>
                    @if($breeder)
                    <strong>{{ $breeder->rattery }}</strong><br>

                    @if($breeder->owner_name)
                    <span class="italic">{{ $breeder->owner_name }}</span><br>
                    @endif

                    @if($breeder->location)
                    <span class="italic">{{ $breeder->location }}</span><br>
                    @endif

                    @if($rat->breeder_reference)
                    <span class="text-xs">
                        <strong>Breeder Number:</strong> {{ $rat->breeder_reference }}
                    </span><br>
                    @endif

                    @if($breeder->website)
                    <a href="{{ $breeder->website }}"
                        target="_blank"
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