@extends('public-v2.layouts.app')

@php
    $eventType = match ($event->type) {
        'dog_sports' => 'Dog Sports',
        'training' => 'Training',
        'workshop' => 'Workshop',
        'class' => 'Class',
        'community' => 'Community',
        default => 'Event',
    };

    $isPast = $event->hasEnded();

    $registrationStatus = $event->effective_registration_status;

    $registrationLabel = match ($registrationStatus) {
        'open' => 'Registration Open',
        'coming_soon' => 'Registration Coming Soon',
        'closed' => 'Registration Closed',
        'not_required' => 'No Registration Required',
        default => 'Registration',
    };

    /*
     * Registration destination:
     * - On-site registrations use the internal registration form.
     * - External registrations use the supplied registration URL.
     */
    $registrationUrl = match ($event->registration_method) {
        'on-site' => route('public-v2.events.register', ['event' => $event->slug]),
        'external' => $event->registration_url,
        default => null,
    };

    $registrationIsExternal = $event->registration_method === 'external';

    $canRegister = ! $isPast
        && $registrationStatus === 'open'
        && ! empty($registrationUrl);
@endphp

@section(
    'meta_title',
    $event->seo_title ?: $event->title . ' | Southern Plains Sport Dog Club'
)

@section(
    'meta_description',
    $event->seo_description ?: $event->short_description
)

@section('og_title', $event->seo_title ?: $event->title)

@section(
    'og_description',
    $event->seo_description ?: $event->short_description
)

@section(
    'og_image',
    $event->featured_image_path
        ? \Illuminate\Support\Facades\Storage::disk('public')->url($event->featured_image_path)
        : asset('images/og/default.jpg')
)

@section(
    'canonical_url',
    route('public-v2.events.show', $event->slug)
)

@section('hero')

{{-- Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 pt-8">

    <div class="col-span-12 md:col-span-5 md:pr-0 pl-8 pr-8">

        <p class="text-eyebrow">
            {{ $eventType }}
        </p>

        <h1 class="text-hero text-sp-charcoal">
            {{ $event->title }}
        </h1>

        <div class="hl-break">
            <hr>
        </div>

        @if ($event->short_description)
            <p class="body-large text-sp-slate">
                {{ $event->short_description }}
            </p>
        @endif

        {{-- Event Metadata --}}
        <div class="mt-5 space-y-2 text-sm text-sp-slate">

            <div class="flex items-start gap-2">
                <x-icons.calendar-range
                    class="mt-0.5 h-4 w-4 shrink-0"
                    aria-hidden="true"
                />

                <span>
                    @if ($event->end_date)
                        {{ $event->start_date->format('F j') }}
                        –
                        {{ $event->end_date->format('F j, Y') }}
                    @else
                        {{ $event->start_date->format('F j, Y') }}
                    @endif
                </span>
            </div>

            @if ($event->start_time)
                <div class="flex items-start gap-2">
                    <x-icons.clock
                        class="mt-0.5 h-4 w-4 shrink-0"
                        aria-hidden="true"
                    />

                    <span>
                        {{ $event->start_time->format('g:i A') }}

                        @if ($event->end_time)
                            –
                            {{ $event->end_time->format('g:i A') }}
                        @endif
                    </span>
                </div>
            @endif

            @if ($event->city || $event->state)
                <div class="flex items-start gap-2">
                    <x-icons.signpost
                        class="mt-0.5 h-4 w-4 shrink-0"
                        aria-hidden="true"
                    />

                    <span>
                        @if ($event->is_private_location)
                            {{ $event->city }}, {{ $event->state }}
                        @else
                            {{ $event->venue_name
                                ? $event->venue_name . ', '
                                : ''
                            }}

                            {{ $event->city }}, {{ $event->state }}
                        @endif
                    </span>
                </div>
            @endif

            @if ($event->registration_status !== 'not_required')
                <div class="flex items-start gap-2">
                    <x-icons.ticket
                        class="mt-0.5 h-4 w-4 shrink-0"
                        aria-hidden="true"
                    />

                    <span>
                        {{ $registrationLabel }}
                    </span>
                </div>
            @endif

        </div>
        {{-- End Event Metadata --}}

        {{-- Hero CTA --}}
        @if (! $isPast)

            @if ($canRegister)
                <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 py-6">

                    <a
                        href="{{ $registrationUrl }}"
                        class="btn-primary"
                        @if ($registrationIsExternal)
                            target="_blank"
                            rel="noopener"
                        @endif
                    >
                        {{ $event->cta_label ?: 'Register Now' }}

                        <x-icons.move-right
                            class="h-4 w-4"
                            aria-hidden="true"
                        />
                    </a>

                </div>

            @elseif (
                $event->registration_status === 'not_required'
                && $event->cta_label
                && $event->cta_url
            )

                <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 py-6">

                    <a
                        href="{{ $event->cta_url }}"
                        class="btn-primary"
                        target="_blank"
                        rel="noopener"
                    >
                        {{ $event->cta_label }}

                        <x-icons.move-right
                            class="h-4 w-4"
                            aria-hidden="true"
                        />
                    </a>

                </div>

            @endif

        @endif

        @if ($event->registration_deadline && ! $isPast)
            <p class="text-sm text-sp-slate">
                Registration closes
                {{ $event->registration_deadline->format('F j, Y') }}.
            </p>
        @endif

        @if ($isPast)
            <p class="text-sm font-semibold text-sp-slate py-6">
                This event has already taken place.
            </p>
        @endif

    </div>

    <div class="col-span-12 mt-8 md:col-span-7 md:mt-0 relative">

        @if ($event->featured_image_path)

            <img
                class="w-full h-full"
                src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($event->featured_image_path) }}"
                alt="{{ $event->featured_image_alt ?? $event->title }}">

            @if ($event->featured_image_credit)
                <x-public-v2.image-registration
                    :text="$event->featured_image_credit"
                    position="right"
                    :href="$event->featured_image_credit_url" />
            @endif

        @else

            <div class="flex w-full h-full min-h-[320px] items-center justify-center bg-sp-limestone">
                <span class="font-display text-2xl text-sp-slate">
                    Southern Plains Sport Dog Club
                </span>
            </div>

        @endif

    </div>

</div>
{{-- End Hero --}}

@endsection

@section('content')

{{-- Event Content --}}
<section class="px-6 py-16 md:px-8 md:py-20">

    <div class="grid grid-cols-12 gap-8 md:gap-12">

        {{-- Main Content --}}
        <div class="col-span-12 md:col-span-8">

            @if ($event->description)
                <section>
                    <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
                        About This Event
                    </h2>

                    <div class="prose max-w-none text-sp-slate mt-5">
                        {!! $event->description !!}
                    </div>
                </section>
            @endif

            @if ($event->what_to_expect)
                <section class="mt-12 border-t border-sp-warmStone pt-8">
                    <h2 class="font-sans text-2xl font-semibold text-sp-charcoal">
                        What to Expect
                    </h2>

                    <div class="prose max-w-none text-sp-slate mt-4">
                        {!! $event->what_to_expect !!}
                    </div>
                </section>
            @endif

            @if ($event->what_to_bring)
                <section class="mt-12 border-t border-sp-warmStone pt-8">
                    <h2 class="font-sans text-2xl font-semibold text-sp-charcoal">
                        What to Bring
                    </h2>

                    <div class="prose max-w-none text-sp-slate mt-4">
                        {!! $event->what_to_bring !!}
                    </div>
                </section>
            @endif

            @if ($event->requirements_notes)
                <section class="mt-12 border-t border-sp-warmStone pt-8">
                    <h2 class="font-sans text-2xl font-semibold text-sp-charcoal">
                        Requirements
                    </h2>

                    <div class="prose max-w-none text-sp-slate mt-4">
                        {!! $event->requirements_notes !!}
                    </div>
                </section>
            @endif

        </div>
        {{-- End Main Content --}}

        {{-- Event Details --}}
        <aside class="col-span-12 md:col-span-4">

            <div class="rounded-md bg-sp-limestone p-6 md:p-8">

                <p class="font-display font-bold text-2xl uppercase text-sp-burntClay">
                    Event Details
                </p>

                <div class="mt-5 border-t border-sp-warmStone pt-5 space-y-5">

                    {{-- Date --}}
                    <div class="flex items-start gap-3">

                        <x-icons.calendar-range
                            class="mt-0.5 h-5 w-5 shrink-0 text-sp-slate"
                            aria-hidden="true"
                        />

                        <div>
                            <p class="text-sm font-semibold text-sp-charcoal">
                                Date
                            </p>

                            <p class="body text-sp-slate mt-1">
                                @if ($event->end_date)
                                    {{ $event->start_date->format('F j') }}
                                    –
                                    {{ $event->end_date->format('F j, Y') }}
                                @else
                                    {{ $event->start_date->format('F j, Y') }}
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- Time --}}
                    @if ($event->start_time)
                        <div class="flex items-start gap-3">

                            <x-icons.clock
                                class="mt-0.5 h-5 w-5 shrink-0 text-sp-slate"
                                aria-hidden="true"
                            />

                            <div>
                                <p class="text-sm font-semibold text-sp-charcoal">
                                    Time
                                </p>

                                <p class="body text-sp-slate mt-1">
                                    {{ $event->start_time->format('g:i A') }}

                                    @if ($event->end_time)
                                        –
                                        {{ $event->end_time->format('g:i A') }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endif

                    {{-- Location --}}
                    @if ($event->city || $event->state)
                        <div class="flex items-start gap-3">

                            <x-icons.signpost
                                class="mt-0.5 h-5 w-5 shrink-0 text-sp-slate"
                                aria-hidden="true"
                            />

                            <div>
                                <p class="text-sm font-semibold text-sp-charcoal">
                                    Location
                                </p>

                                <p class="body text-sp-slate mt-1">
                                    @if ($event->is_private_location)
                                        Private location<br>
                                        {{ $event->city }}, {{ $event->state }}
                                    @else
                                        @if ($event->venue_name)
                                            {{ $event->venue_name }}<br>
                                        @endif

                                        @if ($event->address)
                                            {{ $event->address }}<br>
                                        @endif

                                        {{ $event->city }}, {{ $event->state }}
                                    @endif
                                </p>

                                @if ($event->location_details)
                                    <p class="text-sm text-sp-slate mt-3">
                                        {{ $event->location_details }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endif

                </div>

                {{-- Registration --}}
                @if ($event->registration_status !== 'not_required')

                    <div class="mt-7 border-t border-sp-warmStone pt-6">

                        <div class="flex items-start gap-3">

                            <x-icons.ticket
                                class="mt-0.5 h-5 w-5 shrink-0 text-sp-slate"
                                aria-hidden="true"
                            />

                            <div>
                                <p class="text-sm font-semibold text-sp-charcoal">
                                    Registration
                                </p>

                                <p class="body text-sp-slate mt-1">
                                    {{ $registrationLabel }}
                                </p>
                            </div>
                        </div>

                        @if ($event->registration_deadline && ! $isPast)
                            <p class="text-sm text-sp-slate mt-4">
                                Registration closes
                                {{ $event->registration_deadline->format('F j, Y') }}.
                            </p>
                        @endif

                        @if ($event->registration_notes && ! $isPast)
                            <div class="text-sm text-sp-slate mt-4">
                                {!! $event->registration_notes !!}
                            </div>
                        @endif

                        @if ($canRegister)

                            <a
                                href="{{ $registrationUrl }}"
                                class="mt-5 inline-flex w-full items-center justify-center gap-2 rounded-md bg-sp-prairieGreen px-5 py-3 text-sm font-semibold text-sp-warmIvory transition-colors hover:bg-sp-prairieOchre"
                                @if ($registrationIsExternal)
                                    target="_blank"
                                    rel="noopener"
                                @endif
                            >
                                {{ $event->cta_label ?: 'Register Now' }}

                                <x-icons.move-right
                                    class="h-4 w-4"
                                    aria-hidden="true"
                                />
                            </a>

                        @endif

                    </div>

                @elseif (
                    ! $isPast
                    && $event->cta_label
                    && $event->cta_url
                )

                    <div class="mt-7 border-t border-sp-warmStone pt-6">

                        <a
                            href="{{ $event->cta_url }}"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-md bg-sp-prairieGreen px-5 py-3 text-sm font-semibold text-sp-warmIvory transition-colors hover:bg-sp-prairieOchre"
                            target="_blank"
                            rel="noopener"
                        >
                            {{ $event->cta_label }}

                            <x-icons.move-right
                                class="h-4 w-4"
                                aria-hidden="true"
                            />
                        </a>

                    </div>

                @endif

            </div>

        </aside>
        {{-- End Event Details --}}

    </div>

</section>
{{-- End Event Content --}}

{{-- Back to Events --}}
<div class="px-6 pb-16 md:px-8 md:pb-20">

    <a
        href="{{ route('public-v2.events.archive') }}"
        class="learn-more-link text-sp-prairieGreen"
    >
        Back to Events

        <x-icons.move-left />
    </a>

</div>
{{-- End Back to Events --}}

@endsection