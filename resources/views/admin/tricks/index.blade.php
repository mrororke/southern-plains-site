@extends('layouts.portal')

@section('content')

<div class="p-6">

    <h1 class="text-2xl font-bold mb-6">
        Trick Evaluation Inbox
    </h1>

    <div class="grid grid-cols-4 gap-4 mb-6">

    <div class="border p-4">
        <div class="text-xs uppercase">New</div>
        <div class="text-3xl font-bold">
            {{ $stats['new'] }}
        </div>
    </div>

    <div class="border p-4">
        <div class="text-xs uppercase">In Review</div>
        <div class="text-3xl font-bold">
            {{ $stats['in_review'] }}
        </div>
    </div>

    <div class="border p-4">
        <div class="text-xs uppercase">Awaiting Client</div>
        <div class="text-3xl font-bold">
            {{ $stats['awaiting_client'] }}
        </div>
    </div>

    <div class="border p-4">
        <div class="text-xs uppercase">Completed</div>
        <div class="text-3xl font-bold">
            {{ $stats['completed'] }}
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
                    <span class="px-2 py-1 text-xs font-semibold border rounded">
                        {{ strtoupper($eval->status) }}
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