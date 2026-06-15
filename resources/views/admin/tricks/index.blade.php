@extends('layouts.portal')

@section('content')

<div class="p-6">

    <h1 class="text-2xl font-bold mb-6">
        Trick Evaluation Inbox
    </h1>

    <div class="flex gap-2 mb-6 flex-wrap">

        <a href="{{ route('admin.tricks.index') }}"
            class="border px-3 py-1 text-sm">
            All
        </a>

        <a href="{{ route('admin.tricks.index', ['status' => 'new']) }}"
            class="border px-3 py-1 text-sm">
            New
        </a>

        <a href="{{ route('admin.tricks.index', ['status' => 'in_review']) }}"
            class="border px-3 py-1 text-sm">
            In Review
        </a>

        <a href="{{ route('admin.tricks.index', ['status' => 'awaiting_client']) }}"
            class="border px-3 py-1 text-sm">
            Awaiting Client
        </a>

        <a href="{{ route('admin.tricks.index', ['status' => 'completed']) }}"
            class="border px-3 py-1 text-sm">
            Completed
        </a>

        <a href="{{ route('admin.tricks.index', ['status' => 'archived']) }}"
            class="border px-3 py-1 text-sm">
            Archived
        </a>

    </div>

    <div class="grid grid-cols-5 gap-4 mb-8">

        <div class="border p-4">
            <div class="text-xs uppercase font-bold">New</div>
            <div class="text-4xl font-heading">
                {{ $stats['new'] }}
            </div>
        </div>

        <div class="border p-4">
            <div class="text-xs uppercase font-bold">In Review</div>
            <div class="text-4xl font-heading">
                {{ $stats['in_review'] }}
            </div>
        </div>

        <div class="border p-4">
            <div class="text-xs uppercase font-bold">Awaiting Client</div>
            <div class="text-4xl font-heading">
                {{ $stats['awaiting_client'] }}
            </div>
        </div>

        <div class="border p-4">
            <div class="text-xs uppercase font-bold">Completed</div>
            <div class="text-4xl font-heading">
                {{ $stats['completed'] }}
            </div>
        </div>

        <div class="border p-4">
            <div class="text-xs uppercase font-bold">Archived</div>
            <div class="text-4xl font-heading">
                {{ $stats['archived'] }}
            </div>
        </div>

    </div>

</div>

<div class="space-y-3">

    @foreach($evaluations as $eval)
    <a href="{{ route('admin.tricks.show', $eval->id) }}"
        class="block border p-4 hover:bg-gray-50 transition">

        <div class="flex justify-between items-start">

            {{-- LEFT --}}
            <div>
                <h2 class="font-semibold text-sm">
                    {{ $eval->dog_name }}
                    <span class="text-gray-500 font-normal">
                        — {{ $eval->trick_level }}
                    </span>
                </h2>
                @php
        $badgeClasses = [
            'new' => 'bg-blue-100 text-blue-800',
            'in_review' => 'bg-yellow-100 text-yellow-800',
            'awaiting_client' => 'bg-purple-100 text-purple-800',
            'completed' => 'bg-gray-100 text-gray-800',
            'archived' => 'bg-gray-100 text-gray-500',
        ];
    @endphp

    <span class="px-2 py-1 text-xs font-bold uppercase rounded {{ $badgeClasses[$submission->status] ?? 'bg-gray-100' }}">
        {{ \App\Models\TrickEvaluation::STATUS_LABELS[$submission->status] ?? $submission->status }}
    </span>
                <p class="text-xs text-gray-500">
                    {{ $eval->owner_name }} • {{ $eval->email }}
                </p>
            </div>

            {{-- RIGHT --}}
            <div class="text-right text-xs text-gray-500">
                {{ $eval->created_at->format('M d, H:i') }}
            </div>

        </div>

        {{-- QUICK META --}}
        <div class="mt-2 text-xs text-gray-600">
            Method:
            <span class="font-semibold">{{ $eval->eval_method }}</span>

            @if($eval->video_link)
            • Video Submitted
            @endif

            @if($eval->scheduled_datetime)
            • Scheduled
            @endif
        </div>

    </a>
    @endforeach

</div>

{{-- PAGINATION --}}
<div class="mt-6">
    {{ $evaluations->links() }}
</div>

</div>

@endsection