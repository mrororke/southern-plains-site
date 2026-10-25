@extends('public-v2.layouts.app')

@section('meta_title', 'Request A Judge | Southern Plains Sport Dog Club')

@section('meta_description', 'Request Melanie O’Rorke to judge your NASDA trial. Share your event details and judging needs with Southern Plains Sport Dog Club.')

@section('og_title', 'Request A Judge | Southern Plains Sport Dog Club')

@section('og_description', 'Planning a NASDA trial? Tell us about your event and what you would like Southern Plains Sport Dog Club to judge.')

@section('og_image', asset('images/og/default.jpg'))

@section('canonical_url', 'https://southernplains.dog/inquiries/judge')

@section('structured_data')

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "Request A Judge | Southern Plains Sport Dog Club",
    "description": "Request Melanie O’Rorke to judge your NASDA trial.",
    "url": "https://southernplains.dog/inquiries/judge",
    "isPartOf": {
        "@type": "Website",
        "name": "Southern Plains Sport Dog Club",
        "url": "https://southernplains.dog/"
    }
}
</script>

@endsection


@section('hero')

{{-- Judge Request Hero --}}
<div
    id="hero"
    class="relative overflow-hidden bg-sp-offWhite"
    style="
        background-image: url('{{ asset('images/headers/contact-bg.png') }}');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    "
>

    {{-- Hero Content --}}
    <div
        class="relative z-10 grid grid-cols-12 gap-6 px-6 pt-8 pb-12 md:px-8 md:pt-12 md:pb-16">

        {{-- Judge Request Content --}}
        <div class="col-span-12 md:col-span-10 md:col-start-1">

            {{-- Judge Request Form Card --}}
            <div class="mt-8 max-w-5xl rounded-md bg-sp-limestone p-6 md:mt-16 md:p-8">

                {{-- Intro --}}
                <p class="font-display font-bold text-2xl text-sp-burntClay">
                    Request A Judge
                </p>

                <h1 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">
                    Bring Southern Plains<br class="hidden md:block" />
                    To Your Trial.
                </h1>

                <p class="body-large text-sp-slate mt-4 max-w-2xl">
                    Planning a NASDA trial? Tell us a little about your event and what you’d like Melanie to judge. This is a request, not a booking—if your event looks like a good fit, we’ll follow up to discuss the details.
                </p>


                {{-- Submission Confirmation --}}
                @if (session('success'))

                    <div
                        role="status"
                        class="border-l-4 border-sp-successGreen bg-sp-successGreen/10 rounded-r-md p-6 mt-8">

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
                            class="border-l-4 border-sp-clayRed bg-sp-clayRed/10 rounded-r-md p-6 mt-6 mb-6">

                            <p class="font-sans font-semibold text-lg text-sp-clayRed mb-2">
                                Too Many Requests
                            </p>

                            <p class="body text-sp-charcoal">
                                {{ $message }}
                            </p>

                        </div>

                    @enderror


                    {{-- Judge Request Form --}}
                    <form
                        action="{{ route('inquiries.judge.store') }}"
                        method="POST"
                        class="mt-8"
                        x-data="{
                            equipment: '{{ old('equipment_plan') }}',
                            apprentice: '{{ old('apprentice_request') }}'
                        }">

                        @csrf


                        {{-- Honeypot: leave this field empty --}}
                        <div
                            aria-hidden="true"
                            class="hidden">

                            <label for="website_url">
                                Website URL
                            </label>

                            <input
                                type="text"
                                id="website_url"
                                name="website_url"
                                tabindex="-1"
                                autocomplete="off">

                        </div>


                        {{-- Two Column Form --}}
                        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">


                            {{-- LEFT COLUMN --}}
                            <div>

                                <h2 class="font-sans text-2xl font-semibold text-sp-charcoal">
                                    About Your Event
                                </h2>

                                <p class="body text-sp-slate mt-2 mb-6">
                                    Start with the basics so we can get a sense of your event.
                                </p>


                                {{-- Organization --}}
                                <div>

                                    <label
                                        for="organization"
                                        class="block font-sans text-sm font-semibold text-sp-charcoal">

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
                                        class="mt-2 block w-full rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen">

                                    @error('organization')
                                        <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                    @enderror

                                </div>


                                {{-- Contact Name --}}
                                <div class="mt-4">

                                    <label
                                        for="name"
                                        class="block font-sans text-sm font-semibold text-sp-charcoal">

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
                                        class="mt-2 block w-full rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen">

                                    @error('name')
                                        <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                    @enderror

                                </div>


                                {{-- Email --}}
                                <div class="mt-4">

                                    <label
                                        for="email"
                                        class="block font-sans text-sm font-semibold text-sp-charcoal">

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
                                        class="mt-2 block w-full rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen">

                                    @error('email')
                                        <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                    @enderror

                                </div>


                                {{-- Trial Date --}}
                                <div class="mt-4">

                                    <label
                                        for="trial_date"
                                        class="block font-sans text-sm font-semibold text-sp-charcoal">

                                        Proposed Trial Date(s)<span aria-hidden="true">*</span>

                                    </label>

                                    <input
                                        type="text"
                                        id="trial_date"
                                        name="trial_date"
                                        value="{{ old('trial_date') }}"
                                        required
                                        placeholder="e.g. March 14–15, 2027"
                                        class="mt-2 block w-full rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen">

                                    @error('trial_date')
                                        <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                    @enderror

                                </div>


                                {{-- Trial Location --}}
                                <div class="mt-4">

                                    <label
                                        for="location"
                                        class="block font-sans text-sm font-semibold text-sp-charcoal">

                                        Trial Location<span aria-hidden="true">*</span>

                                    </label>

                                    <input
                                        type="text"
                                        id="location"
                                        name="location"
                                        value="{{ old('location') }}"
                                        required
                                        placeholder="Venue, City, State"
                                        class="mt-2 block w-full rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen">

                                    @error('location')
                                        <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                    @enderror

                                </div>


                                {{-- Equipment --}}
                                <fieldset class="mt-8">

                                    <legend class="block font-sans text-sm font-semibold text-sp-charcoal">
                                        Will you need equipment from Southern Plains?<span aria-hidden="true">*</span>
                                    </legend>

                                    <div class="space-y-3 mt-3">

                                        <label class="flex items-start gap-3 text-sm text-sp-charcoal">
                                            <input
                                                type="radio"
                                                name="equipment_plan"
                                                value="no"
                                                x-model="equipment"
                                                required
                                                class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">

                                            <span>No</span>
                                        </label>

                                        <label class="flex items-start gap-3 text-sm text-sp-charcoal">
                                            <input
                                                type="radio"
                                                name="equipment_plan"
                                                value="yes"
                                                x-model="equipment"
                                                class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">

                                            <span>Yes</span>
                                        </label>

                                        <label class="flex items-start gap-3 text-sm text-sp-charcoal">
                                            <input
                                                type="radio"
                                                name="equipment_plan"
                                                value="unsure"
                                                x-model="equipment"
                                                class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">

                                            <span>Not sure yet</span>
                                        </label>

                                    </div>

                                    @error('equipment_plan')
                                        <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                    @enderror

                                </fieldset>


                                {{-- Equipment Details --}}
                                <div
                                    x-show="equipment === 'yes'"
                                    x-cloak
                                    class="mt-4">

                                    <label
                                        for="equipment_details"
                                        class="block font-sans text-sm font-semibold text-sp-charcoal">

                                        What equipment will you need?

                                    </label>

                                    <input
                                        type="text"
                                        id="equipment_details"
                                        name="equipment_details"
                                        value="{{ old('equipment_details') }}"
                                        placeholder="e.g. quarry boxes, sheds, rats"
                                        class="mt-2 block w-full rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen">

                                    @error('equipment_details')
                                        <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                    @enderror

                                </div>


                                {{-- Apprentice / Shadow --}}
                                <fieldset class="mt-8">

                                    <legend class="block font-sans text-sm font-semibold text-sp-charcoal">
                                        Are you requesting an apprentice or shadow judge?<span aria-hidden="true">*</span>
                                    </legend>

                                    <div class="space-y-3 mt-3">

                                        <label class="flex items-start gap-3 text-sm text-sp-charcoal">
                                            <input
                                                type="radio"
                                                name="apprentice_request"
                                                value="no"
                                                x-model="apprentice"
                                                required
                                                class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">

                                            <span>No</span>
                                        </label>

                                        <label class="flex items-start gap-3 text-sm text-sp-charcoal">
                                            <input
                                                type="radio"
                                                name="apprentice_request"
                                                value="yes"
                                                x-model="apprentice"
                                                class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">

                                            <span>Yes</span>
                                        </label>

                                        <label class="flex items-start gap-3 text-sm text-sp-charcoal">
                                            <input
                                                type="radio"
                                                name="apprentice_request"
                                                value="unsure"
                                                x-model="apprentice"
                                                class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">

                                            <span>Not sure yet</span>
                                        </label>

                                    </div>

                                    <p class="text-sm text-sp-slate mt-3">
                                        Apprentice and shadow participation is subject to approval and is not guaranteed by submitting this request.
                                    </p>

                                    @error('apprentice_request')
                                        <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                    @enderror

                                </fieldset>


                                {{-- Apprentice / Shadow Details --}}
                                <div
                                    x-show="apprentice === 'yes'"
                                    x-cloak
                                    class="mt-4">

                                    <label
                                        for="apprentice_details"
                                        class="block font-sans text-sm font-semibold text-sp-charcoal">

                                        Tell us about the apprentice or shadow request.

                                    </label>

                                    <textarea
                                        id="apprentice_details"
                                        name="apprentice_details"
                                        rows="3"
                                        placeholder="Name and any relevant details"
                                        class="mt-2 block w-full resize-y rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen">{{ old('apprentice_details') }}</textarea>

                                    @error('apprentice_details')
                                        <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                    @enderror

                                </div>

                            </div>


                            {{-- RIGHT COLUMN --}}
                            <div>

                                <h2 class="font-sans text-2xl font-semibold text-sp-charcoal">
                                    Your Request
                                </h2>

                                <p class="body text-sp-slate mt-2 mb-6">
                                    Tell us what you’d like Melanie to judge.
                                </p>


                                {{-- Classes & Levels --}}
                                <fieldset>

                                    <legend class="block font-sans text-sm font-semibold text-sp-charcoal">
                                        Classes & Levels Requested<span aria-hidden="true">*</span>
                                    </legend>

                                    <p class="text-sm text-sp-slate mt-2 mb-4">
                                        Select all that apply.
                                    </p>


                                    {{-- Den Hunt --}}
                                    <div class="border-t border-sp-warmStone pt-3">

                                        <p class="font-sans text-sm font-semibold text-sp-charcoal">
                                            Den Hunt
                                        </p>

                                        <div class="grid grid-cols-2 gap-x-4 gap-y-2 mt-2">

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="den_hunt_pat"
                                                    @checked(in_array('den_hunt_pat', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                PAT
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="den_hunt_level_1"
                                                    @checked(in_array('den_hunt_level_1', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                Level I
                                            </label>

                                        </div>

                                    </div>


                                    {{-- Lost Item Recovery --}}
                                    <div class="border-t border-sp-warmStone pt-3 mt-3">

                                        <p class="font-sans text-sm font-semibold text-sp-charcoal">
                                            Lost Item Recovery
                                        </p>

                                        <div class="grid grid-cols-2 gap-x-4 gap-y-2 mt-2">

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="lost_item_pat"
                                                    @checked(in_array('lost_item_pat', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                PAT
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="lost_item_level_1"
                                                    @checked(in_array('lost_item_level_1', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                Level I
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="lost_item_level_2"
                                                    @checked(in_array('lost_item_level_2', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                Level II
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="lost_item_level_3"
                                                    @checked(in_array('lost_item_level_3', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                Level III
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="lost_item_mch"
                                                    @checked(in_array('lost_item_mch', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                MCH
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="lost_item_gch"
                                                    @checked(in_array('lost_item_gch', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                GCH
                                            </label>

                                        </div>

                                    </div>


                                    {{-- Shed Dog --}}
                                    <div class="border-t border-sp-warmStone pt-3 mt-3">

                                        <p class="font-sans text-sm font-semibold text-sp-charcoal">
                                            Shed Dog
                                        </p>

                                        <div class="grid grid-cols-2 gap-x-4 gap-y-2 mt-2">

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="shed_pat"
                                                    @checked(in_array('shed_pat', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                PAT
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="shed_level_1"
                                                    @checked(in_array('shed_level_1', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                Level I
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="shed_level_2"
                                                    @checked(in_array('shed_level_2', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                Level II
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="shed_level_3"
                                                    @checked(in_array('shed_level_3', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                Level III
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="shed_mch"
                                                    @checked(in_array('shed_mch', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                MCH
                                            </label>

                                        </div>

                                    </div>


                                    {{-- Trailing & Locating --}}
                                    <div class="border-t border-sp-warmStone pt-3 mt-3">

                                        <p class="font-sans text-sm font-semibold text-sp-charcoal">
                                            Trailing & Locating
                                        </p>

                                        <div class="grid grid-cols-2 gap-x-4 gap-y-2 mt-2">

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="trailing_locating_pat"
                                                    @checked(in_array('trailing_locating_pat', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                PAT
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="trailing_locating_level_1"
                                                    @checked(in_array('trailing_locating_level_1', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                Level I
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="trailing_locating_level_2"
                                                    @checked(in_array('trailing_locating_level_2', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                Level II
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="trailing_locating_level_3"
                                                    @checked(in_array('trailing_locating_level_3', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                Level III
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="trailing_locating_mch"
                                                    @checked(in_array('trailing_locating_mch', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                MCH
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="trailing_locating_gch"
                                                    @checked(in_array('trailing_locating_gch', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                GCH
                                            </label>

                                        </div>

                                    </div>


                                    {{-- Trailing Brace --}}
                                    <div class="border-t border-sp-warmStone pt-3 mt-3">

                                        <p class="font-sans text-sm font-semibold text-sp-charcoal">
                                            Trailing Brace
                                        </p>

                                        <div class="grid grid-cols-2 gap-x-4 gap-y-2 mt-2">

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="trailing_brace_pat"
                                                    @checked(in_array('trailing_brace_pat', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                PAT
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="trailing_brace_level_1"
                                                    @checked(in_array('trailing_brace_level_1', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                Level I
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="trailing_brace_level_2"
                                                    @checked(in_array('trailing_brace_level_2', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                Level II
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="trailing_brace_level_3"
                                                    @checked(in_array('trailing_brace_level_3', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                Level III
                                            </label>

                                        </div>

                                    </div>


                                    {{-- Urban Locating --}}
                                    <div class="border-t border-sp-warmStone pt-3 mt-3">

                                        <p class="font-sans text-sm font-semibold text-sp-charcoal">
                                            Urban Locating
                                        </p>

                                        <div class="grid grid-cols-2 gap-x-4 gap-y-2 mt-2">

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="urban_locating_pat"
                                                    @checked(in_array('urban_locating_pat', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                PAT
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="urban_locating_level_1"
                                                    @checked(in_array('urban_locating_level_1', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                Level I
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="urban_locating_level_2"
                                                    @checked(in_array('urban_locating_level_2', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                Level II
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="urban_locating_level_3"
                                                    @checked(in_array('urban_locating_level_3', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                Level III
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="urban_locating_mch"
                                                    @checked(in_array('urban_locating_mch', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                MCH
                                            </label>

                                            <label class="flex items-center gap-2 text-sm text-sp-charcoal">
                                                <input
                                                    type="checkbox"
                                                    name="classes[]"
                                                    value="urban_locating_gch"
                                                    @checked(in_array('urban_locating_gch', old('classes', [])))
                                                    class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">
                                                GCH
                                            </label>

                                        </div>

                                    </div>


                                    @error('classes')
                                        <p class="text-sp-clayRed mt-4">{{ $message }}</p>
                                    @enderror

                                </fieldset>

                            </div>

                        </div>


                        {{-- Additional Information --}}
                        <div class="mt-8 border-t border-sp-warmStone pt-8">

                            <label
                                for="message"
                                class="block font-sans text-sm font-semibold text-sp-charcoal">

                                Anything Else We Should Know?

                            </label>

                            <p class="text-sm text-sp-slate mt-2">
                                Tell us anything else that may help us understand your event or request.
                            </p>

                            <textarea
                                id="message"
                                name="message"
                                rows="5"
                                placeholder="Optional"
                                class="mt-2 block w-full resize-y rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen">{{ old('message') }}</textarea>

                            @error('message')
                                <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                            @enderror

                        </div>


                        {{-- Submit --}}
                        <button
                            type="submit"
                            class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-md bg-sp-prairieGreen px-5 py-3 font-sans text-sm font-semibold uppercase tracking-wide text-white transition-colors hover:bg-sp-prairieGreen/90">

                            Request A Judge

                            <x-icons.move-right
                                class="h-5 w-5 shrink-0"
                                aria-hidden="true" />

                        </button>

                    </form>
                    {{-- End Judge Request Form --}}

                @endif

            </div>
            {{-- End Judge Request Form Card --}}

        </div>
        {{-- End Judge Request Content --}}


        {{-- Image Registration --}}
        <div class="absolute inset-y-0 right-0 z-20 hidden w-5/12 md:block">

            <x-public-v2.image-registration
                text="Hamish, Photo by Blue Ridge Creative"
                position="right"
                href="https://www.blueridgeprairie.studio/" />

        </div>
        {{-- End Image Registration --}}

    </div>
    {{-- End Hero Content --}}

</div>
{{-- End Judge Request Hero --}}

@endsection


@section('content')

{{-- No additional content --}}

@endsection