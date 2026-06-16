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

            <div class="mt-2">
                <span class="inline-block px-3 py-1 text-xs font-bold uppercase border rounded {{ \App\Models\TrickEvaluation::color($submission->status) }}">
                    {{ \App\Models\TrickEvaluation::label($submission->status) }}
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

        {{-- NOTES --}}
<div class="bg-white border p-4">

    <h3 class="font-semibold mb-3">Notes</h3>

    {{-- LIST --}}
    <div class="space-y-3 mb-4">

        @forelse($submission->notes as $note)

            <div class="border p-2 text-sm bg-gray-50">
                <div class="text-xs text-gray-500 mb-1">
                    {{ $note->user->name ?? 'System' }}
                    • {{ $note->created_at->format('M d, H:i') }}
                </div>

                <div class="text-gray-800">
                    {{ $note->body }}
                </div>
            </div>

        @empty

            <p class="text-xs text-gray-500">No notes yet.</p>

        @endforelse

    </div>

    {{-- FORM --}}
    <form method="POST" action="{{ route('admin.tricks.notes.store', $submission) }}">
        @csrf

        <textarea name="body"
                  class="w-full border p-2 text-sm"
                  rows="3"
                  placeholder="Add a note..."></textarea>

        <button class="mt-2 border px-3 py-1 text-sm hover:bg-gray-50">
            Add Note
        </button>
    </form>

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

        {{-- RAW DIFF --}}
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

        {{-- STATUS --}}
        <h3 class="font-semibold mb-2">Status</h3>

        <span class="inline-block px-3 py-1 text-xs font-bold uppercase border rounded {{ \App\Models\TrickEvaluation::color($submission->status) }}">
            {{ \App\Models\TrickEvaluation::label($submission->status) }}
        </span>

        {{-- TIME IN STATUS --}}
        <div class="mt-3 text-xs text-gray-500">
            In status: {{ $submission->timeInStatus() }}
        </div>

        {{-- STUCK WARNING --}}
        @if($submission->isStuck())
            <div class="mt-2 text-xs text-red-600 font-semibold">
                ⚠ This item may need attention
            </div>
        @endif

        {{-- RECOMMENDED ACTION --}}
        @if($submission->recommendedAction())
            <div class="mt-4">
                <h4 class="text-xs font-semibold text-gray-600 mb-1">
                    Suggested next step
                </h4>

                <p class="text-sm text-gray-800">
                    {{ $submission->recommendedAction() }}
                </p>
            </div>
        @endif

        {{-- ACTIONS --}}
        <h3 class="font-semibold mt-4 mb-2">Actions</h3>

        <div class="space-y-2">

            @foreach(\App\Models\TrickEvaluation::allowedTransitions($submission->status) as $nextStatus)

                <form method="POST" action="{{ route('admin.tricks.status', $submission) }}">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="status" value="{{ $nextStatus }}">

                    <button type="submit"
                        class="w-full border p-2 text-left hover:bg-gray-50">
                        Move to {{ \App\Models\TrickEvaluation::label($nextStatus) }}
                    </button>
                </form>

            @endforeach

        </div>

    </div>

</div>
</div>

@endsection