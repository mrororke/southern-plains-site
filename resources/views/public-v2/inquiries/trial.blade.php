@extends('public-v2.layouts.app')

@section('meta_title', 'Request A Trial | Southern Plains Sport Dog Club')

@section('meta_description', 'Planning a NASDA trial? Tell Southern Plains Sport Dog Club about your event and what you would like to offer.')

@section('og_title', 'Request A Trial | Southern Plains Sport Dog Club')

@section('og_description', 'Planning a NASDA trial? Tell us about your event and what you would like to offer.')

@section('og_image', asset('images/og/default.jpg'))

@section('canonical_url', 'https://southernplains.dog/inquiries/trial')

@section('structured_data')
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "Request A Trial | Southern Plains Sport Dog Club",
        "description": "Request support from Southern Plains Sport Dog Club for your NASDA trial.",
        "url": "https://southernplains.dog/inquiries/trial",
        "isPartOf": {
            "@type": "Website",
            "name": "Southern Plains Sport Dog Club",
            "url": "https://southernplains.dog/"
        }
    }
    </script>
@endsection

@section('hero')

    {{-- Trial Request Hero --}}
    <div
        id="hero"
        class="relative overflow-hidden bg-sp-offWhite"
        style="
            background-image: url('{{ asset('images/headers/contact-bg.png') }}');
            background-repeat: no-repeat;
            background-position: center left;
            background-size: cover;
        "
    >

        {{-- Hero Content --}}
        <div class="relative z-10 grid grid-cols-12 gap-6 px-6 pt-8 pb-12 md:px-8 md:pt-12 md:pb-16">

            {{-- Trial Request Content --}}
            <div class="col-span-12 md:col-span-10 md:col-start-1">

                {{-- Trial Request Form Card --}}
                <div class="mt-8 max-w-5xl rounded-md bg-sp-limestone p-6 md:mt-16 md:p-8">

                    {{-- Intro --}}
                    <p class="font-display font-bold text-2xl text-sp-burntClay">
                        Bring NASDA To Your Club
                    </p>

                    <h1 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">
                        Let’s Put A Trial Together.
                    </h1>

                    <p class="body-large text-sp-slate mt-4 max-w-2xl">
                        Have a trial in mind? Share a few details about your club and what you’re hoping to offer. We’ll take a look and get back to you about availability and next steps.
                    </p>

                    {{-- Submission Confirmation --}}
                    @if (session('success'))

                        <div
                            role="status"
                            class="border-l-4 border-sp-successGreen bg-sp-successGreen/10 rounded-r-md p-6 mt-8"
                        >

                            <p class="font-sans font-semibold text-lg text-sp-successGreen mb-3">
                                {{ session('success.title') }}
                            </p>

                            <p class="body text-sp-slate whitespace-pre-line">
                                {{ session('success.message') }}
                            </p>

                        </div>

                    @else

                        {{-- Rate Limit Notification --}}
                        @error('rate_limit')

                            <div
                                role="alert"
                                class="border-l-4 border-sp-clayRed bg-sp-clayRed/10 rounded-r-md p-6 mt-6 mb-6"
                            >

                                <p class="font-sans font-semibold text-lg text-sp-clayRed mb-2">
                                    Too Many Requests
                                </p>

                                <p class="body text-sp-charcoal">
                                    {{ $message }}
                                </p>

                            </div>

                        @enderror

                        {{-- Trial Request Form --}}
                        <form
                            id="trial-request-form"
                            action="{{ route('public-v2.inquiries.trial.store') }}"
                            method="POST"
                            class="mt-8"
                        >

                            @csrf

                            {{-- Honeypot --}}
                            <div
                                aria-hidden="true"
                                class="hidden"
                            >

                                <label for="website_url">
                                    Website URL
                                </label>

                                <input
                                    type="text"
                                    id="website_url"
                                    name="website_url"
                                    tabindex="-1"
                                    autocomplete="off"
                                >

                            </div>

                            {{-- Two Column Form --}}
                            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">

                                {{-- LEFT COLUMN --}}
                                <div>

                                    <h2 class="font-sans text-2xl font-semibold text-sp-charcoal">
                                        About Your Trial
                                    </h2>

                                    <p class="body text-sp-slate mt-2 mb-6">
                                        Start with the basics so we can get a sense of your event.
                                    </p>

                                    {{-- Organization --}}
                                    <div>

                                        <label
                                            for="organization"
                                            class="block font-sans text-sm font-semibold text-sp-charcoal"
                                        >
                                            Club / Organization Name<span aria-hidden="true">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            id="organization"
                                            name="organization"
                                            autocomplete="organization"
                                            value="{{ old('organization') }}"
                                            required
                                            placeholder="Club or organization name"
                                            class="mt-2 block w-full rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen"
                                        >

                                        @error('organization')
                                            <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                        @enderror

                                    </div>

                                    {{-- Contact Name --}}
                                    <div class="mt-4">

                                        <label
                                            for="name"
                                            class="block font-sans text-sm font-semibold text-sp-charcoal"
                                        >
                                            Contact Name<span aria-hidden="true">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            id="name"
                                            name="name"
                                            autocomplete="name"
                                            value="{{ old('name') }}"
                                            required
                                            placeholder="Your name"
                                            class="mt-2 block w-full rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen"
                                        >

                                        @error('name')
                                            <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                        @enderror

                                    </div>

                                    {{-- Email --}}
                                    <div class="mt-4">

                                        <label
                                            for="email"
                                            class="block font-sans text-sm font-semibold text-sp-charcoal"
                                        >
                                            Email Address<span aria-hidden="true">*</span>
                                        </label>

                                        <input
                                            type="email"
                                            id="email"
                                            name="email"
                                            autocomplete="email"
                                            value="{{ old('email') }}"
                                            required
                                            placeholder="Your email address"
                                            class="mt-2 block w-full rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen"
                                        >

                                        @error('email')
                                            <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                        @enderror

                                    </div>

                                    {{-- Trial Date --}}
                                    <div class="mt-4">

                                        <label
                                            for="trial_date"
                                            class="block font-sans text-sm font-semibold text-sp-charcoal"
                                        >
                                            Proposed Trial Date(s)<span aria-hidden="true">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            id="trial_date"
                                            name="trial_date"
                                            value="{{ old('trial_date') }}"
                                            required
                                            placeholder="e.g. March 14–15, 2027"
                                            class="mt-2 block w-full rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen"
                                        >

                                        @error('trial_date')
                                            <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                        @enderror

                                    </div>

                                    {{-- Venue --}}
                                    <div class="mt-4">

                                        <label
                                            for="venue"
                                            class="block font-sans text-sm font-semibold text-sp-charcoal"
                                        >
                                            Trial Venue<span aria-hidden="true">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            id="venue"
                                            name="venue"
                                            value="{{ old('venue') }}"
                                            required
                                            placeholder="Venue name"
                                            class="mt-2 block w-full rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen"
                                        >

                                        @error('venue')
                                            <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                        @enderror

                                    </div>

                                    {{-- City / State --}}
                                    <div class="mt-4">

                                        <label
                                            for="city_state"
                                            class="block font-sans text-sm font-semibold text-sp-charcoal"
                                        >
                                            City / State<span aria-hidden="true">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            id="city_state"
                                            name="city_state"
                                            value="{{ old('city_state') }}"
                                            required
                                            placeholder="e.g. Tulsa, OK"
                                            class="mt-2 block w-full rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen"
                                        >

                                        @error('city_state')
                                            <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                        @enderror

                                    </div>

                                    {{-- Venue Status --}}
                                    <fieldset class="mt-8">

                                        <legend class="block font-sans text-sm font-semibold text-sp-charcoal">
                                            Is the venue secured?<span aria-hidden="true">*</span>
                                        </legend>

                                        <div class="space-y-3 mt-3">

                                            <label class="flex items-start gap-3 text-sm text-sp-charcoal">

                                                <input
                                                    type="radio"
                                                    name="venue_status"
                                                    value="secured"
                                                    @checked(old('venue_status') === 'secured')
                                                    required
                                                    class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen"
                                                >

                                                <span>Yes, the venue is secured</span>

                                            </label>

                                            <label class="flex items-start gap-3 text-sm text-sp-charcoal">

                                                <input
                                                    type="radio"
                                                    name="venue_status"
                                                    value="in_progress"
                                                    @checked(old('venue_status') === 'in_progress')
                                                    class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen"
                                                >

                                                <span>In progress</span>

                                            </label>

                                            <label class="flex items-start gap-3 text-sm text-sp-charcoal">

                                                <input
                                                    type="radio"
                                                    name="venue_status"
                                                    value="not_secured"
                                                    @checked(old('venue_status') === 'not_secured')
                                                    class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen"
                                                >

                                                <span>No, not yet</span>

                                            </label>

                                        </div>

                                        @error('venue_status')
                                            <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                        @enderror

                                    </fieldset>

                                </div>

                                {{-- RIGHT COLUMN --}}
                                <div>

                                    <h2 class="font-sans text-2xl font-semibold text-sp-charcoal">
                                        Your Trial
                                    </h2>

                                    <p class="body text-sp-slate mt-2 mb-6">
                                        Tell us what you’re hoping to offer.
                                    </p>

                                    {{-- Trial Format --}}
                                    <fieldset>

                                        <legend class="block font-sans text-sm font-semibold text-sp-charcoal">
                                            What are you hoping to host?<span aria-hidden="true">*</span>
                                        </legend>

                                        <div class="space-y-3 mt-3">

                                            <label class="flex items-start gap-3 text-sm text-sp-charcoal">

                                                <input
                                                    type="radio"
                                                    name="trial_format"
                                                    value="one_day"
                                                    @checked(old('trial_format') === 'one_day')
                                                    required
                                                    class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen"
                                                >

                                                <span>One-day trial</span>

                                            </label>

                                            <label class="flex items-start gap-3 text-sm text-sp-charcoal">

                                                <input
                                                    type="radio"
                                                    name="trial_format"
                                                    value="multi_day"
                                                    @checked(old('trial_format') === 'multi_day')
                                                    class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen"
                                                >

                                                <span>Multi-day trial</span>

                                            </label>

                                            <label class="flex items-start gap-3 text-sm text-sp-charcoal">

                                                <input
                                                    type="radio"
                                                    name="trial_format"
                                                    value="not_sure"
                                                    @checked(old('trial_format') === 'not_sure')
                                                    class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen"
                                                >

                                                <span>Not sure yet</span>

                                            </label>

                                        </div>

                                        @error('trial_format')
                                            <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                        @enderror

                                    </fieldset>

                                    {{-- Classes Requested --}}
                                    <fieldset class="mt-8">

                                        <legend class="block font-sans text-sm font-semibold text-sp-charcoal">
                                            Classes Requested<span aria-hidden="true">*</span>
                                        </legend>

                                        <p class="text-sm text-sp-slate mt-2 mb-4">
                                            Select all that apply.
                                        </p>

                                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">

                                            <label class="flex items-center gap-3 text-sm text-sp-charcoal">

                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="lost_item_recovery"
                                                    @checked(in_array('lost_item_recovery', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen"
                                                >

                                                <span>Lost Item Recovery</span>

                                            </label>

                                            <label class="flex items-center gap-3 text-sm text-sp-charcoal">

                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="shed_dog"
                                                    @checked(in_array('shed_dog', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen"
                                                >

                                                <span>Shed Dog</span>

                                            </label>

                                            <label class="flex items-center gap-3 text-sm text-sp-charcoal">

                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="trailing_locating"
                                                    @checked(in_array('trailing_locating', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen"
                                                >

                                                <span>Trailing &amp; Locating</span>

                                            </label>

                                            <label class="flex items-center gap-3 text-sm text-sp-charcoal">

                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="trailing_brace"
                                                    @checked(in_array('trailing_brace', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen"
                                                >

                                                <span>Trailing Brace</span>

                                            </label>

                                            <label class="flex items-center gap-3 text-sm text-sp-charcoal">

                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="urban_locating"
                                                    @checked(in_array('urban_locating', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen"
                                                >

                                                <span>Urban Locating</span>

                                            </label>

                                        </div>

                                        @error('classes')
                                            <p class="text-sp-clayRed mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </fieldset>

                                    {{-- Equipment --}}
                                    <fieldset class="mt-8">

                                        <legend class="block font-sans text-sm font-semibold text-sp-charcoal">
                                            Will you need to rent equipment from Southern Plains?<span aria-hidden="true">*</span>
                                        </legend>

                                        <div class="space-y-3 mt-3">

                                            <label class="flex items-start gap-3 text-sm text-sp-charcoal">

                                                <input
                                                    type="radio"
                                                    name="equipment_request"
                                                    value="no"
                                                    @checked(old('equipment_request') === 'no')
                                                    required
                                                    class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen"
                                                >

                                                <span>No</span>

                                            </label>

                                            <label class="flex items-start gap-3 text-sm text-sp-charcoal">

                                                <input
                                                    type="radio"
                                                    name="equipment_request"
                                                    value="yes"
                                                    @checked(old('equipment_request') === 'yes')
                                                    class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen"
                                                >

                                                <span>Yes</span>

                                            </label>

                                            <label class="flex items-start gap-3 text-sm text-sp-charcoal">

                                                <input
                                                    type="radio"
                                                    name="equipment_request"
                                                    value="not_sure"
                                                    @checked(old('equipment_request') === 'not_sure')
                                                    class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen"
                                                >

                                                <span>Not sure yet</span>

                                            </label>

                                        </div>

                                        @error('equipment_request')
                                            <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                        @enderror

                                    </fieldset>

                                    {{-- Equipment Details --}}
                                    <div
                                        id="equipment-details"
                                        class="hidden mt-4"
                                    >

                                        <label
                                            for="equipment_needed"
                                            class="block font-sans text-sm font-semibold text-sp-charcoal"
                                        >
                                            What equipment might you need?
                                        </label>

                                        <textarea
                                            id="equipment_needed"
                                            name="equipment_needed"
                                            rows="3"
                                            placeholder="Tell us what you think you may need."
                                            class="mt-2 block w-full resize-y rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen"
                                        >{{ old('equipment_needed') }}</textarea>

                                        @error('equipment_needed')
                                            <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                        @enderror

                                    </div>

                                </div>

                            </div>

                            {{-- Additional Information --}}
                            <div class="mt-8 border-t border-sp-warmStone pt-8">

                                <label
                                    for="message"
                                    class="block font-sans text-sm font-semibold text-sp-charcoal"
                                >
                                    Anything Else We Should Know?
                                </label>

                                <p class="text-sm text-sp-slate mt-2">
                                    Tell us anything else that may help us understand your trial or what you’re looking for.
                                </p>

                                <textarea
                                    id="message"
                                    name="message"
                                    rows="5"
                                    placeholder="Optional"
                                    class="mt-2 block w-full resize-y rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen"
                                >{{ old('message') }}</textarea>

                                @error('message')
                                    <p class="text-sp-clayRed mt-2">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                            {{-- Submit --}}
                            <button
                                type="submit"
                                class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-md bg-sp-prairieGreen px-5 py-3 font-sans text-sm font-semibold uppercase tracking-wide text-white transition-colors hover:bg-sp-prairieGreen/90"
                            >
                                Request A Trial

                                <x-icons.move-right
                                    class="h-5 w-5 shrink-0"
                                    aria-hidden="true"
                                />
                            </button>

                        </form>

                    @endif

                </div>
                {{-- End Trial Request Form Card --}}

                {{-- Image Registration --}}
                <div class="relative mt-5 h-20 hidden md:block">

                    <x-public-v2.image-registration
                        text="Hamish, Photo by Blue Ridge Creative"
                        position="bottom"
                        href="https://www.blueridgeprairie.studio/" />

                </div>
                {{-- End Image Registration --}}

            </div>
            {{-- End Trial Request Content --}}

        </div>
        {{-- End Hero Content --}}

    </div>
    {{-- End Trial Request Hero --}}

@endsection

@section('content')

    {{-- No additional content --}}

@endsection

{{-- Trial Request Conditional Fields --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const equipmentOptions = document.querySelectorAll(
            'input[name="equipment_request"]'
        );

        const equipmentDetails = document.getElementById(
            'equipment-details'
        );

        function updateEquipment() {

            const selected = document.querySelector(
                'input[name="equipment_request"]:checked'
            );

            if (selected && selected.value === 'yes') {
                equipmentDetails.classList.remove('hidden');
            } else {
                equipmentDetails.classList.add('hidden');
            }
        }

        equipmentOptions.forEach(function (option) {
            option.addEventListener('change', updateEquipment);
        });

        updateEquipment();

    });
</script>