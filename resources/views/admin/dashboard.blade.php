@extends('layouts.portal')

@section('title', 'Admin Dashboard')

@section('content')

<div class="grid grid-cols-5 gap-4">

    {{-- STATS --}}
    <div class="bg-club p-4 text-center text-white">
        <h1 class="font-heading text-7xl">42</h1>
        <h4 class="uppercase text-xs font-bold">Active Clients</h4>
        <p>+5 this month</p>
    </div>

    <div class="bg-training p-4 text-center text-white">
        <h1 class="font-heading text-7xl">42</h1>
        <h4 class="uppercase text-xs font-bold">Total Dogs</h4>
        <p>+5 this month</p>
    </div>

    <div class="bg-league p-4 text-center text-white">
        <h1 class="font-heading text-7xl">42</h1>
        <h4 class="uppercase text-xs font-bold">Active Programs</h4>
        <p>+5 this month</p>
    </div>

    <div class="bg-brand-gray p-4 text-center text-white">
        <h1 class="font-heading text-7xl">42</h1>
        <h4 class="uppercase text-xs font-bold">Published Posts</h4>
        <p>+5 this month</p>
    </div>

    {{-- SIDEBAR / GLANCE --}}
    <div class="col-start-5 row-span-2 bg-[#03CCFF]/25 p-4">
        <h2 class="font-heading text-2xl pb-2">At a Glance</h2>
    </div>

    {{-- MAIN COLUMN --}}
    <div class="col-span-4 pt-4 space-y-10">
        {{-- INBOX --}}
        <div>
            <h2 class="font-heading text-4xl pb-2">Inbox</h2>

            @foreach($inbox as $inboxItem)
                <a href="{{ $inboxItem['link'] }}" class="block border p-3 mb-2">

                    <div class="flex justify-between">

                        <div class="font-semibold">
                            {{ $inboxItem['title'] }}
                        </div>

                        <span class="text-xs px-2 py-1 rounded {{ $inboxItem['status_color'] }}">
                            {{ $inboxItem['status_label'] }}
                        </span>

                    </div>

                    @if(!empty($inboxItem['subtitle']))
                        <div class="text-sm text-gray-500">
                            {{ $inboxItem['subtitle'] }}
                        </div>
                    @endif

                    <div class="text-xs text-gray-400 mt-1">
                        {{ $inboxItem['created_at'] }}
                    </div>

                </a>
            @endforeach
        </div>

        {{-- RECENT ACTIVITY --}}
        <div>
            <h2 class="font-heading text-4xl pb-2">Recent Updates</h2>

            @foreach($recentActivity as $activity)
                <div class="py-3 border-b">

                    <div class="flex justify-between items-start gap-4">

                        <div>
                            <h4 class="font-semibold text-sm">

                                @if(!empty($activity['link']) && $activity['model_id'])
                                    <a href="{{ $activity['link'] }}" class="text-training hover:underline">
                                        {{ $activity['entity'] ?? ($activity['model'] . ' #' . $activity['model_id']) }}
                                    </a>
                                @else
                                    {{ $activity['entity'] ?? ($activity['model'] . ' #' . $activity['model_id']) }}
                                @endif

                                — {{ $activity['action'] }}

                            </h4>

                            <p class="text-xs text-gray-500">
                                {{ $activity['created_at'] }}
                            </p>
                        </div>

                    </div>

                    <p class="text-sm mt-1 text-gray-800">
                        {{ $activity['summary'] }}
                    </p>

                    @if(!empty($activity['diff']))
                        <details class="mt-2">
                            <summary class="text-xs text-training cursor-pointer">
                                View full changes
                            </summary>

                            <div class="mt-2 space-y-2">

                                @foreach($activity['diff'] as $change)
                                    <div class="text-xs bg-gray-50 p-2 rounded">

                                        <div class="font-semibold text-gray-700">
                                            {{ $change['field'] }}
                                        </div>

                                        <div class="text-gray-600 mt-1">
                                            <span class="text-red-600">
                                                {{ is_null($change['old']) ? 'null' : json_encode($change['old']) }}
                                            </span>

                                            <span class="mx-2">→</span>

                                            <span class="text-green-600">
                                                {{ is_null($change['new']) ? 'null' : json_encode($change['new']) }}
                                            </span>
                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        </details>
                    @endif

                </div>
            @endforeach
        </div>

        

    </div>

</div>

@endsection