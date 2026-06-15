@extends('layouts.portal')

@section('content')

<pre class="text-xs bg-black text-white p-2">
{{ dd($submission->status) }}
</pre>
<div class="grid grid-cols-5 gap-6">

    {{-- MAIN CONTENT --}}
    <div class="border-b pb-4">
    <h1 class="text-2xl font-bold">
        {{ $title }}
    </h1>

    <div class="mt-2">
        @php
    $badgeClasses = [
        'new' => 'bg-club/25',
        'in_review' => 'bg-training/25',
        'awaiting_client' => 'bg-league/25',
        'completed' => 'bg-gray-100',
        'archived' => 'bg-gray-50 text-gray-500',
    ];
@endphp

<span class="px-2 py-1 text-xs font-bold uppercase rounded {{ $badgeClasses[$submission->status] ?? 'bg-gray-100' }}">
    {{ str_replace('_', ' ', $submission->status) }}
</span>

       
    </div>

    <p class="text-sm text-gray-500 mt-2">
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

        <h3 class="font-semibold mb-4">Status</h3>

        <div class="mb-4">
            <span class="inline-block px-3 py-1 text-xs font-bold uppercase border rounded">
                {{ str_replace('_', ' ', $submission->status) }}
            </span>
        </div>

        <h3 class="font-semibold mb-2">Actions</h3>

        <div class="space-y-2">

            @if($submission->status === 'new')

                <form method="POST" action="{{ route('admin.tricks.status', $submission) }}">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="status" value="in_review">

                    <button type="submit"
                        class="w-full border p-2 text-left hover:bg-gray-50">
                        Mark In Review
                    </button>
                </form>

            @endif

            @if($submission->status === 'in_review')

                <form method="POST" action="{{ route('admin.tricks.status', $submission) }}">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="status" value="awaiting_client">

                    <button type="submit"
                        class="w-full border p-2 text-left hover:bg-gray-50">
                        Await Client Response
                    </button>
                </form>

                <form method="POST" action="{{ route('admin.tricks.status', $submission) }}">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="status" value="completed">

                    <button type="submit"
                        class="w-full border p-2 text-left hover:bg-gray-50">
                        Mark Completed
                    </button>
                </form>

            @endif

            @if($submission->status === 'awaiting_client')

                <form method="POST" action="{{ route('admin.tricks.status', $submission) }}">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="status" value="in_review">

                    <button type="submit"
                        class="w-full border p-2 text-left hover:bg-gray-50">
                        Resume Review
                    </button>
                </form>

                <form method="POST" action="{{ route('admin.tricks.status', $submission) }}">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="status" value="completed">

                    <button type="submit"
                        class="w-full border p-2 text-left hover:bg-gray-50">
                        Mark Completed
                    </button>
                </form>

            @endif

            @if($submission->status === 'completed')

                <form method="POST" action="{{ route('admin.tricks.status', $submission) }}">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="status" value="archived">

                    <button type="submit"
                        class="w-full border p-2 text-left hover:bg-gray-50">
                        Archive
                    </button>
                </form>

            @endif

            @if($submission->status === 'archived')

                <form method="POST" action="{{ route('admin.tricks.status', $submission) }}">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="status" value="completed">

                    <button type="submit"
                        class="w-full border p-2 text-left hover:bg-gray-50">
                        Restore
                    </button>
                </form>

            @endif

        </div>

    </div>

</div>

</div>
@endsection