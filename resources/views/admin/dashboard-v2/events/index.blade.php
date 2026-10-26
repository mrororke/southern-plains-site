@extends('admin.dashboard-v2.desktop')

@section('title', 'Events')

@section('content')

<div class="dashboard-content">

    {{-- Header Image --}}
    <div class="py-4">
        <img
            src="{{ asset('images/headers/header-events.jpg') }}"
            alt="Southern Plains Sport Dog Club events."
            class="rounded-md">
    </div>


    {{-- Page Header --}}
    <div class="flex flex-wrap items-center justify-between gap-4">

        <h1 class="font-sans text-sp-charcoal font-semibold text-6xl">
            Events
        </h1>

        <a
            href="{{ route('admin.events-v2.create') }}"
            class="ml-auto inline-flex items-center justify-center gap-2
               rounded-md bg-sp-prairieGreen px-4 py-2
               text-sm font-semibold text-sp-warmIvory
               transition-colors hover:bg-sp-prairieOchre">

            <x-icons.plus
                class="h-4 w-4"
                aria-hidden="true" />

            Create Event

        </a>

    </div>
    {{-- End Page Header --}}


    {{-- Event Summary --}}
    <div class="mt-6 flex flex-wrap items-center gap-x-4 gap-y-2 text-sm text-sp-slate">

        <span class="font-semibold text-sp-charcoal">
            {{ $eventCounts['total'] }}
            {{ \Illuminate\Support\Str::plural('Event', $eventCounts['total']) }}
        </span>

        <span aria-hidden="true" class="text-sp-slate/30">|</span>

        <span>
            {{ $eventCounts['published'] }} Published
        </span>

        <span>
            {{ $eventCounts['scheduled'] }} Scheduled
        </span>

        <span>
            {{ $eventCounts['draft'] }} Drafts
        </span>

        <span>
            {{ $eventCounts['cancelled'] }} Cancelled
        </span>

    </div>
    {{-- End Event Summary --}}


    {{-- Event Library --}}
    <div class="mt-8">

        @if ($events->isEmpty())

        {{-- Empty Library --}}
        <div class="rounded-lg border border-dashed border-sp-slate/20 px-6 py-12 text-center">

            <h2 class="font-archivo text-lg font-semibold text-sp-charcoal">
                No events yet
            </h2>

            <p class="mt-2 text-sm text-sp-slate">
                Your Events library is ready for its first event.
            </p>

            <a
                href="{{ route('admin.events-v2.create') }}"
                class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-sp-prairieGreen hover:underline">

                Create Your First Event

                <x-icons.move-right
                    class="h-4 w-4"
                    aria-hidden="true" />

            </a>

        </div>

        @else

        {{-- Event Table --}}
        <div class="overflow-hidden rounded-lg border border-sp-slate/10 bg-white">

            {{-- Table Header --}}
            <div class="hidden gap-6 border-b border-sp-slate/10 bg-sp-warmIvory/50 px-6 py-4 md:grid md:grid-cols-[minmax(0,5fr)_minmax(0,2fr)_minmax(0,2fr)_minmax(0,2fr)_minmax(0,2fr)]">

                <div>
                    <span class="text-xs font-semibold uppercase tracking-wider text-sp-slate">
                        Event
                    </span>
                </div>

                <div>
                    <span class="text-xs font-semibold uppercase tracking-wider text-sp-slate">
                        Type
                    </span>
                </div>

                <div>
                    <span class="text-xs font-semibold uppercase tracking-wider text-sp-slate">
                        Date
                    </span>
                </div>

                <div>
                    <span class="text-xs font-semibold uppercase tracking-wider text-sp-slate">
                        Status
                    </span>
                </div>

                <div class="text-right">
                    <span class="text-xs font-semibold uppercase tracking-wider text-sp-slate">
                        Updated
                    </span>
                </div>

            </div>
            {{-- End Table Header --}}


            {{-- Event Rows --}}
            <div class="divide-y divide-sp-slate/10">

                @foreach ($events as $event)

                @php
                    $isScheduled =
                        $event->status === 'published'
                        && $event->published_at
                        && $event->published_at->isFuture();

                    $isPublished =
                        $event->status === 'published'
                        && $event->published_at
                        && $event->published_at->lte(now());

                    $displayStatus = match (true) {
                        $isScheduled => 'Scheduled',
                        $isPublished => 'Published',
                        $event->status === 'draft' => 'Draft',
                        $event->status === 'cancelled' => 'Cancelled',
                        default => 'Unscheduled',
                    };

                    $eventType = match ($event->type) {
                        'dog_sports' => 'Dog Sports',
                        'training' => 'Training',
                        'workshop' => 'Workshop',
                        'class' => 'Class',
                        'community' => 'Community',
                        default => 'Other',
                    };
                @endphp

                <a
                    href="{{ route('admin.events-v2.edit', $event) }}"
                    class="group block px-6 py-4 transition-all duration-150 hover:bg-sp-warmIvory hover:shadow-[inset_3px_0_0_0_#506853] focus-visible:bg-sp-warmIvory focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-sp-prairieGreen">

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-[minmax(0,5fr)_minmax(0,2fr)_minmax(0,2fr)_minmax(0,2fr)_minmax(0,2fr)] md:items-center md:gap-6">

                        {{-- Event Title --}}
                        <div class="min-w-0">

                            <h2 class="font-sans text-lg font-semibold leading-snug text-sp-charcoal transition-colors group-hover:text-sp-prairieGreen">

                                {{ $event->title }}

                            </h2>

                            @if ($isScheduled)

                            <p class="mt-2 text-xs text-sp-slate">
                                Scheduled for
                                {{ $event->published_at->format('M j, Y') }}
                                at
                                {{ $event->published_at->format('g:i A') }}
                                Central
                            </p>

                            @endif

                        </div>
                        {{-- End Event Title --}}


                        {{-- Event Type --}}
                        <div>

                            <span class="text-sm text-sp-slate">
                                {{ $eventType }}
                            </span>

                        </div>
                        {{-- End Event Type --}}


                        {{-- Event Date --}}
                        <div>

                            @if ($event->end_date)

                            <span class="text-sm text-sp-slate">
                                {{ $event->start_date->format('M j') }}
                                –
                                {{ $event->end_date->format('M j, Y') }}
                            </span>

                            @else

                            <span class="text-sm text-sp-slate">
                                {{ $event->start_date->format('M j, Y') }}
                            </span>

                            @endif

                        </div>
                        {{-- End Event Date --}}


                        {{-- Publication Status --}}
                        <div>

                            <div class="flex items-center gap-2">

                                @if ($displayStatus === 'Published')

                                <span
                                    class="h-2 w-2 shrink-0 rounded-full bg-sp-prairieGreen"
                                    aria-hidden="true">
                                </span>

                                @elseif ($displayStatus === 'Scheduled')

                                <span
                                    class="h-2 w-2 shrink-0 rounded-full bg-sp-prairieOchre"
                                    aria-hidden="true">
                                </span>

                                @elseif ($displayStatus === 'Draft')

                                <span
                                    class="h-2 w-2 shrink-0 rounded-full bg-sp-slate/40"
                                    aria-hidden="true">
                                </span>

                                @elseif ($displayStatus === 'Cancelled')

                                <span
                                    class="h-2 w-2 shrink-0 rounded-full bg-sp-burntClay"
                                    aria-hidden="true">
                                </span>

                                @else

                                <span
                                    class="h-2 w-2 shrink-0 rounded-full bg-sp-slate/20"
                                    aria-hidden="true">
                                </span>

                                @endif

                                <span class="text-sm font-medium text-sp-charcoal">
                                    {{ $displayStatus }}
                                </span>

                            </div>

                        </div>
                        {{-- End Publication Status --}}


                        {{-- Last Updated --}}
                        <div class="md:text-right">

                            <span
                                class="text-xs text-sp-slate/70"
                                title="{{ $event->updated_at->format('M j, Y g:i A') }}">

                                {{ $event->updated_at->diffForHumans() }}

                            </span>

                        </div>
                        {{-- End Last Updated --}}

                    </div>

                </a>

                @endforeach

            </div>
            {{-- End Event Rows --}}

        </div>
        {{-- End Event Table --}}


        {{-- Pagination --}}
        @if ($events->hasPages())

        <div class="mt-6">
            {{ $events->links() }}
        </div>

        @endif
        {{-- End Pagination --}}

        @endif

    </div>
    {{-- End Event Library --}}

</div>

@endsection