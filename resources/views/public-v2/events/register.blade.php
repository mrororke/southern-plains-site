
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

    $registrationStatus = $event->effective_registration_status;

    $registrationLabel = match ($registrationStatus) {
        'open' => 'Registration Open',
        'coming_soon' => 'Registration Coming Soon',
        'closed' => 'Registration Closed',
        'not_required' => 'No Registration Required',
        default => 'Registration',
    };
@endphp

@section('meta_title', 'Register for ' . $event->title . ' | Southern Plains Sport Dog Club')
@section('meta_description', 'Register for ' . $event->title . ' with Southern Plains Sport Dog Club.')

@section('hero')

{{-- Hero --}}
<div id="hero" class="grid grid-cols-12 pt-8">

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

            <div class="flex items-start gap-2">
                <x-icons.ticket
                    class="mt-0.5 h-4 w-4 shrink-0"
                    aria-hidden="true"
                />

                <span>
                    {{ $registrationLabel }}
                </span>
            </div>

        </div>
        {{-- End Event Metadata --}}

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

<section class="px-6 py-16 md:px-8 md:py-20">

    <div class="grid grid-cols-12 gap-8 md:gap-12">

        {{-- Main Content --}}
        <div class="col-span-12 md:col-span-8">

            <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
                Event Registration
            </h2>

            <p class="body text-sp-slate mt-5">
                Choose how you'd like to participate, then tell us a little about yourself and your dog.
            </p>

            @if (session('success'))

                <div role="status" class="mt-8 border-l-4 border-sp-prairieGreen pl-5">
                    <h3 class="font-sans text-xl font-semibold text-sp-charcoal">
                        {{ session('success.title') }}
                    </h3>

                    <p class="body text-sp-slate mt-3 whitespace-pre-line">
                        {{ session('success.message') }}
                    </p>
                </div>

            @else

                @error('rate_limit')
                    <div role="alert" class="mt-8 border-l-4 border-sp-burntClay pl-5">
                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal">
                            Too Many Registrations
                        </h3>

                        <p class="body text-sp-slate mt-3">
                            {{ $message }}
                        </p>
                    </div>
                @enderror

                @error('registration')
                    <div role="alert" class="mt-8 border-l-4 border-sp-burntClay pl-5">
                        <p class="body text-sp-slate">
                            {{ $message }}
                        </p>
                    </div>
                @enderror

                <form
                    method="POST"
                    action="{{ route('public-v2.events.register.store', $event) }}"
                    class="mt-8"
                    x-data="eventRegistrationForm(
                        {{ \Illuminate\Support\Js::from(old('participation_type', 'working')) }},
                        {{ \Illuminate\Support\Js::from(old('dogs', [['name' => '', 'age' => '', 'breed' => '']])) }},
                        {{ \Illuminate\Support\Js::from($event->working_price) }},
                        {{ \Illuminate\Support\Js::from($event->auditor_price) }}
                    )"
                >
                    @csrf

                    <div aria-hidden="true" class="hidden">
                        <label for="website_url">Website URL</label>
                        <input
                            type="text"
                            id="website_url"
                            name="website_url"
                            tabindex="-1"
                            autocomplete="off"
                        >
                    </div>

                    {{-- Participant Information --}}
                    <section>

                        <h3 class="font-sans text-2xl font-semibold text-sp-charcoal">
                            Participant Information
                        </h3>

                        <div class="mt-6 space-y-5">

                            <div>
                                <label for="name" class="block text-sm font-semibold text-sp-charcoal mb-2">
                                    Your Name *
                                </label>

                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required
                                    autocomplete="name"
                                    class="w-full rounded-md"
                                >

                                @error('name')
                                    <p class="text-sp-burntClay text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                                <div>
                                    <label for="email" class="block text-sm font-semibold text-sp-charcoal mb-2">
                                        Email Address *
                                    </label>

                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                        autocomplete="email"
                                        class="w-full rounded-md"
                                    >

                                    @error('email')
                                        <p class="text-sp-burntClay text-sm mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="phone" class="block text-sm font-semibold text-sp-charcoal mb-2">
                                        Phone Number *
                                    </label>

                                    <input
                                        type="tel"
                                        id="phone"
                                        name="phone"
                                        value="{{ old('phone') }}"
                                        required
                                        autocomplete="tel"
                                        class="w-full rounded-md"
                                    >

                                    @error('phone')
                                        <p class="text-sp-burntClay text-sm mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                        </div>

                    </section>
                    {{-- End Participant Information --}}

                    {{-- Participation --}}
                    <section class="mt-12 border-t border-sp-warmStone pt-8">

                        <h3 class="font-sans text-2xl font-semibold text-sp-charcoal">
                            Participation
                        </h3>

                        <fieldset class="mt-5">

                            <legend class="block text-sm font-semibold text-sp-charcoal mb-4">
                                How Would You Like to Participate? *
                            </legend>

                            <div class="space-y-3">

                                <label class="flex items-center gap-3 text-sp-slate">
                                    <input
                                        type="radio"
                                        name="participation_type"
                                        value="working"
                                        x-model="participation"
                                        required
                                    >

                                    <span class="body">
                                        Working Team
                                    </span>
                                </label>

                                <label class="flex items-center gap-3 text-sp-slate">
                                    <input
                                        type="radio"
                                        name="participation_type"
                                        value="auditor"
                                        x-model="participation"
                                        required
                                    >

                                    <span class="body">
                                        Auditor
                                    </span>
                                </label>

                            </div>

                            @error('participation_type')
                                <p class="text-sp-burntClay text-sm mt-2">{{ $message }}</p>
                            @enderror

                        </fieldset>

                    </section>
                    {{-- End Participation --}}

                    {{-- Working Dogs --}}
                    <section
                        class="mt-12 border-t border-sp-warmStone pt-8"
                        x-show="participation === 'working'"
                        x-cloak
                    >

                        <h3 class="font-sans text-2xl font-semibold text-sp-charcoal">
                            Your Working Dogs
                        </h3>

                        <p class="body text-sp-slate mt-3">
                            Each dog requires its own working spot.
                        </p>

                        <div class="mt-6 space-y-8">

                            <template x-for="(dog, index) in dogs" :key="dog.id">

                                <div>

                                    <div class="flex items-center justify-between gap-4">

                                        <h4
                                            class="font-sans text-xl font-semibold text-sp-charcoal"
                                            x-text="'Dog ' + (index + 1)"
                                        ></h4>

                                        <button
                                            type="button"
                                            x-show="dogs.length > 1"
                                            x-on:click="removeDog(index)"
                                            class="learn-more-link text-sp-prairieGreen"
                                        >
                                            Remove Dog
                                        </button>

                                    </div>

                                    <div class="mt-5 space-y-5">

                                        <div>
                                            <label
                                                class="block text-sm font-semibold text-sp-charcoal mb-2"
                                                :for="'dog-name-' + dog.id"
                                            >
                                                Dog's Name *
                                            </label>

                                            <input
                                                type="text"
                                                :id="'dog-name-' + dog.id"
                                                :name="'dogs[' + index + '][name]'"
                                                x-model="dog.name"
                                                :required="participation === 'working'"
                                                :disabled="participation !== 'working'"
                                                maxlength="255"
                                                class="w-full rounded-md"
                                            >
                                        </div>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                                            <div>
                                                <label
                                                    class="block text-sm font-semibold text-sp-charcoal mb-2"
                                                    :for="'dog-age-' + dog.id"
                                                >
                                                    Age *
                                                </label>

                                                <input
                                                    type="text"
                                                    :id="'dog-age-' + dog.id"
                                                    :name="'dogs[' + index + '][age]'"
                                                    x-model="dog.age"
                                                    :required="participation === 'working'"
                                                    :disabled="participation !== 'working'"
                                                    maxlength="100"
                                                    class="w-full rounded-md"
                                                >
                                            </div>

                                            <div>
                                                <label
                                                    class="block text-sm font-semibold text-sp-charcoal mb-2"
                                                    :for="'dog-breed-' + dog.id"
                                                >
                                                    Breed *
                                                </label>

                                                <input
                                                    type="text"
                                                    :id="'dog-breed-' + dog.id"
                                                    :name="'dogs[' + index + '][breed]'"
                                                    x-model="dog.breed"
                                                    :required="participation === 'working'"
                                                    :disabled="participation !== 'working'"
                                                    maxlength="255"
                                                    class="w-full rounded-md"
                                                >
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </template>

                        </div>

                        <button
                            type="button"
                            x-on:click="addDog()"
                            :disabled="dogs.length >= 20"
                            class="learn-more-link text-sp-prairieGreen mt-6 disabled:opacity-50"
                        >
                            + Add Another Dog
                        </button>

                        @error('dogs')
                            <p class="text-sp-burntClay text-sm mt-3">{{ $message }}</p>
                        @enderror

                        @foreach ($errors->getMessages() as $field => $messages)
                            @if (str_starts_with($field, 'dogs.'))
                                @foreach ($messages as $message)
                                    <p class="text-sp-burntClay text-sm mt-3">{{ $message }}</p>
                                @endforeach
                            @endif
                        @endforeach

                    </section>
                    {{-- End Working Dogs --}}

                    {{-- Registration Pricing --}}
                    <section class="mt-12 border-t border-sp-warmStone pt-8">

                        <h3 class="font-sans text-2xl font-semibold text-sp-charcoal">
                            Registration Pricing
                        </h3>

                        <div class="mt-6 rounded-md bg-sp-limestone p-6">

                            <div class="flex flex-wrap items-start justify-between gap-4">

                                <div>
                                    <p class="text-sm font-semibold text-sp-charcoal"
                                        x-text="participation === 'working' ? 'Working Spots' : 'Auditor Registration'">
                                    </p>

                                    <p class="body-small text-sp-slate mt-2"
                                        x-text="participation === 'working'
                                            ? dogs.length + (dogs.length === 1 ? ' dog' : ' dogs') + ' × ' + formatPrice(workingPrice)
                                            : '1 auditor × ' + formatPrice(auditorPrice)">
                                    </p>
                                </div>

                                <div class="text-right">
                                    <p class="text-xs uppercase tracking-wide text-sp-slate mb-2">
                                        Registration Total
                                    </p>

                                    <p
                                        class="font-sans text-2xl font-semibold text-sp-charcoal"
                                        aria-live="polite"
                                        x-text="formatPrice(registrationTotal)"
                                    ></p>
                                </div>

                            </div>

                            <p
                                class="body-small text-sp-slate mt-5"
                                x-show="registrationTotal === null"
                                x-cloak
                            >
                                Pricing has not been specified for this registration type.
                            </p>

                            <p class="body-small text-sp-slate mt-5">
                                This is your registration total, not a payment request. If you're waitlisted, please don't send payment until you're offered a spot.
                            </p>

                        </div>

                    </section>
                    {{-- End Registration Pricing --}}

                    {{-- Experience --}}
                    <section class="mt-12 border-t border-sp-warmStone pt-8">

                        <h3 class="font-sans text-2xl font-semibold text-sp-charcoal">
                            Your Experience
                        </h3>

                        <div class="mt-6 space-y-6">

                            <div>
                                <label for="nasda_experience" class="block text-sm font-semibold text-sp-charcoal mb-2">
                                    Tell Us About Your NASDA Experience
                                </label>

                                <textarea
                                    id="nasda_experience"
                                    name="nasda_experience"
                                    rows="3"
                                    class="w-full rounded-md"
                                >{{ old('nasda_experience') }}</textarea>

                                @error('nasda_experience')
                                    <p class="text-sp-burntClay text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="other_sports" class="block text-sm font-semibold text-sp-charcoal mb-2">
                                    Do You Participate in Other Dog Sports?
                                </label>

                                <textarea
                                    id="other_sports"
                                    name="other_sports"
                                    rows="2"
                                    class="w-full rounded-md"
                                >{{ old('other_sports') }}</textarea>

                                @error('other_sports')
                                    <p class="text-sp-burntClay text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div x-show="participation === 'working'" x-cloak>
                                <label for="reinforcers" class="block text-sm font-semibold text-sp-charcoal mb-2">
                                    What Does Your Dog Find Rewarding?
                                </label>

                                <textarea
                                    id="reinforcers"
                                    name="reinforcers"
                                    rows="2"
                                    class="w-full rounded-md"
                                    :disabled="participation !== 'working'"
                                >{{ old('reinforcers') }}</textarea>

                                @error('reinforcers')
                                    <p class="text-sp-burntClay text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="notes" class="block text-sm font-semibold text-sp-charcoal mb-2">
                                    Anything Else We Should Know?
                                </label>

                                <textarea
                                    id="notes"
                                    name="notes"
                                    rows="4"
                                    class="w-full rounded-md"
                                >{{ old('notes') }}</textarea>

                                @error('notes')
                                    <p class="text-sp-burntClay text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                    </section>
                    {{-- End Experience --}}

                    {{-- Permissions --}}
                    <section class="mt-12 border-t border-sp-warmStone pt-8">

                        <h3 class="font-sans text-2xl font-semibold text-sp-charcoal">
                            Permissions & Acknowledgment
                        </h3>

                        <fieldset class="mt-6">

                            <legend class="block text-sm font-semibold text-sp-charcoal mb-4">
                                May Southern Plains Sport Dog Club use photos of you or your dog from this event? *
                            </legend>

                            <div class="flex flex-wrap gap-6">

                                <label class="flex items-center gap-2 text-sp-slate">
                                    <input
                                        type="radio"
                                        name="photo_permission"
                                        value="1"
                                        @checked(old('photo_permission') === '1')
                                        required
                                    >
                                    Yes
                                </label>

                                <label class="flex items-center gap-2 text-sp-slate">
                                    <input
                                        type="radio"
                                        name="photo_permission"
                                        value="0"
                                        @checked(old('photo_permission') === '0')
                                        required
                                    >
                                    No
                                </label>

                            </div>

                            @error('photo_permission')
                                <p class="text-sp-burntClay text-sm mt-2">{{ $message }}</p>
                            @enderror

                        </fieldset>

                        <div class="mt-8">

                            <label class="flex items-start gap-3 text-sp-slate">

                                <input
                                    type="checkbox"
                                    name="policy_acknowledged"
                                    value="1"
                                    @checked(old('policy_acknowledged'))
                                    required
                                    class="mt-1"
                                >

                                <span class="body-small">
                                    I have read and understand the workshop policies, including the refund, transfer, weather, and payment requirements. *
                                </span>

                            </label>

                            @error('policy_acknowledged')
                                <p class="text-sp-burntClay text-sm mt-2">{{ $message }}</p>
                            @enderror

                        </div>

                    </section>
                    {{-- End Permissions --}}

                    <div class="mt-10">

                        <button type="submit" class="btn-primary">
                            Submit Registration

                            <x-icons.move-right
                                class="h-4 w-4"
                                aria-hidden="true"
                            />
                        </button>

                        <p class="body-small text-sp-slate mt-5">
                            Available spots are reserved pending payment. If the event is full, you'll be added to the waitlist instead. Your registration is not confirmed until payment is recorded.
                        </p>

                    </div>

                </form>

            @endif

        </div>
        {{-- End Main Content --}}

        {{-- Registration Details --}}
        <aside class="col-span-12 md:col-span-4">

            <div class="rounded-md bg-sp-limestone p-6 md:p-8">

                <p class="font-display font-bold text-2xl uppercase text-sp-burntClay">
                    Registration Details
                </p>

                <div class="mt-5 border-t border-sp-warmStone pt-5 space-y-5">

                    <div class="flex items-start gap-3">

                        <x-icons.ticket
                            class="mt-0.5 h-5 w-5 shrink-0 text-sp-slate"
                            aria-hidden="true"
                        />

                        <div>
                            <p class="text-sm font-semibold text-sp-charcoal">
                                Participation
                            </p>

                            <p class="body text-sp-slate mt-1">
                                Working participants bring dogs to practice. Auditors attend without a working dog and can watch and learn.
                            </p>
                        </div>

                    </div>

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

                </div>

                @if ($event->registration_notes)
                    <div class="mt-7 border-t border-sp-warmStone pt-6">

                        <h3 class="font-sans text-lg font-semibold text-sp-charcoal">
                            Registration Information
                        </h3>

                        <p class="body text-sp-slate whitespace-pre-line mt-3">
                            {{ $event->registration_notes }}
                        </p>

                    </div>
                @endif

                <div class="mt-7 border-t border-sp-warmStone pt-6">

                    <h3 class="font-sans text-lg font-semibold text-sp-charcoal">
                        Workshop Policies
                    </h3>

                    <ul class="list-disc pl-5 mt-4 space-y-3 body-small text-sp-slate">
                        <li>Workshops take place in all weather conditions unless the organizer announces otherwise.</li>
                        <li>Refunds are not available within 48 hours of the workshop.</li>
                        <li>Registrations are not transferable.</li>
                        <li>Waitlisted participants should not pay until offered a spot.</li>
                        <li>Dogs must be safely managed between activities, including when crated in vehicles.</li>
                    </ul>

                </div>

                <div class="mt-7 border-t border-sp-warmStone pt-6">

                    <h3 class="font-sans text-lg font-semibold text-sp-charcoal">
                        Payment & Waitlist
                    </h3>

                    <p class="body-small text-sp-slate mt-3">
                        Each dog requires its own working spot. If there isn't enough room for all dogs in your registration, the entire registration will be waitlisted.
                    </p>

                    <p class="body-small text-sp-slate mt-3">
                        Your registration is confirmed once payment is recorded. Please don't send payment if you're waitlisted until you're offered a spot.
                    </p>

                </div>

            </div>

        </aside>
        {{-- End Registration Details --}}

    </div>

</section>

{{-- Back to Event --}}
<div class="px-6 pb-16 md:px-8 md:pb-20">

    <a
        href="{{ route('public-v2.events.show', $event->slug) }}"
        class="learn-more-link text-sp-prairieGreen"
    >
        Back to Event

        <x-icons.move-left />
    </a>

</div>
{{-- End Back to Event --}}

<script>
    function eventRegistrationForm(initialParticipation, initialDogs, workingPrice, auditorPrice) {

        let nextDogId = 0;

        const makeDog = (dog = {}) => ({
            id: nextDogId++,
            name: dog.name ?? '',
            age: dog.age ?? '',
            breed: dog.breed ?? '',
        });

        return {
            participation: initialParticipation,

            dogs: Array.isArray(initialDogs) && initialDogs.length
                ? initialDogs.map(makeDog)
                : [makeDog()],

            workingPrice: workingPrice === null ? null : Number(workingPrice),
            auditorPrice: auditorPrice === null ? null : Number(auditorPrice),

            get registrationTotal() {
                if (this.participation === 'working') {
                    return this.workingPrice === null
                        ? null
                        : this.workingPrice * this.dogs.length;
                }

                return this.auditorPrice;
            },

            formatPrice(amount) {
                if (amount === null || amount === undefined) {
                    return 'Not specified';
                }

                if (amount === 0) {
                    return 'Free';
                }

                return new Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: 'USD',
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2,
                }).format(amount);
            },

            addDog() {
                if (this.dogs.length >= 20) {
                    return;
                }

                this.dogs.push(makeDog());
            },

            removeDog(index) {
                if (this.dogs.length <= 1) {
                    return;
                }

                this.dogs.splice(index, 1);
            },
        };
    }
</script>

@endsection
