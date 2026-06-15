@extends('layouts.portal')

@section('content')
<div class="grid grid-cols-5 gap-6">

    {{-- MAIN CONTENT --}}
    <div class="col-span-4 space-y-6">

        {{-- HEADER --}}
        <div class="border-b pb-4">
            <h1 class="text-2xl font-bold">
                {{ $title }}
            </h1>

            <p class="text-sm text-gray-500">
                Submitted: {{ $created_at }}
            </p>
        </div>

        {{-- SUMMARY BLOCK --}}
        <div class="bg-gray-50 border p-4">
            <h2 class="font-semibold mb-2">Summary</h2>
            <p class="text-sm">{{ $summary }}</p>
        </div>

        {{-- DETAILS --}}
        <div class="bg-white border p-4">
            <h2 class="font-semibold mb-4">Details</h2>

            <dl class="grid grid-cols-2 gap-4 text-sm">
                @foreach($fields as $label => $value)
                <div>
                    <dt class="font-semibold text-gray-600">{{ $label }}</dt>
                    <dd class="text-gray-900">
                        {{ is_array($value) ? json_encode($value) : $value }}
                    </dd>
                </div>
                @endforeach
            </dl>
        </div>

        {{-- RAW DIFF (optional debug) --}}
        @if(!empty($diff))
        <details class="border p-4">
            <summary class="cursor-pointer text-sm text-training">
                View change history
            </summary>

            <div class="mt-3 space-y-2 text-xs">
                @foreach($diff as $change)
                <div class="border p-2 bg-gray-50">
                    <div class="font-semibold">{{ $change['field'] }}</div>
                    <div>
                        <span class="text-red-600">
                            {{ json_encode($change['old']) }}
                        </span>
                        →
                        <span class="text-green-600">
                            {{ json_encode($change['new']) }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </details>
        @endif

    </div>

    {{-- SIDEBAR --}}
    <div class="col-span-1 space-y-4">

        <div class="border p-4">
            <h3 class="font-semibold mb-2">Actions</h3>

            <form method="POST"
                action="{{ route('admin.tricks.status', $trickEvaluation) }}">
                @csrf
                @method('PATCH')

                <input type="hidden"
                    name="status"
                    value="in_review">

                <button type="submit"
                    class="w-full border p-2">
                    Mark In Review
                </button>
            </form>
        </div>

    </div>

</div>
@endsection