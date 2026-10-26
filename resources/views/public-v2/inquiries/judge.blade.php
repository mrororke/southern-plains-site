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
        background-position: center left;
        background-size: cover;
    "
>

    {{-- Hero Content --}}
    <div class="relative z-10 grid grid-cols-12 gap-6 px-6 pt-8 pb-12 md:px-8 md:pt-12 md:pb-16">

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
                        id="judge-request-form"
                        action="{{ route('public-v2.inquiries.judge.store') }}"
                        method="POST"
                        class="mt-8">

                        @csrf

                        {{-- Honeypot --}}
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

                            </div>

                            {{-- RIGHT COLUMN --}}
                            <div>

                                <h2 class="font-sans text-2xl font-semibold text-sp-charcoal">
                                    Your Request
                                </h2>

                                <p class="body text-sp-slate mt-2 mb-6">
                                    Tell us what you’d like Melanie to judge.
                                </p>

                                {{-- Classes Requested --}}
                                <fieldset>

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
                                                value="den_hunt"
                                                @checked(in_array('den_hunt', old('classes', [])))
                                                class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">

                                            <span>Den Hunt</span>
                                        </label>

                                        <label class="flex items-center gap-3 text-sm text-sp-charcoal">
                                            <input
                                                type="checkbox"
                                                name="classes[]"
                                                value="lost_item_recovery"
                                                @checked(in_array('lost_item_recovery', old('classes', [])))
                                                class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">

                                            <span>Lost Item Recovery</span>
                                        </label>

                                        <label class="flex items-center gap-3 text-sm text-sp-charcoal">
                                            <input
                                                type="checkbox"
                                                name="classes[]"
                                                value="shed_dog"
                                                @checked(in_array('shed_dog', old('classes', [])))
                                                class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">

                                            <span>Shed Dog</span>
                                        </label>

                                        <label class="flex items-center gap-3 text-sm text-sp-charcoal">
                                            <input
                                                type="checkbox"
                                                name="classes[]"
                                                value="trailing_locating"
                                                @checked(in_array('trailing_locating', old('classes', [])))
                                                class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">

                                            <span>Trailing &amp; Locating</span>
                                        </label>

                                        <label class="flex items-center gap-3 text-sm text-sp-charcoal">
                                            <input
                                                type="checkbox"
                                                name="classes[]"
                                                value="trailing_brace"
                                                @checked(in_array('trailing_brace', old('classes', [])))
                                                class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">

                                            <span>Trailing Brace</span>
                                        </label>

                                        <label class="flex items-center gap-3 text-sm text-sp-charcoal">
                                            <input
                                                type="checkbox"
                                                name="classes[]"
                                                value="urban_locating"
                                                @checked(in_array('urban_locating', old('classes', [])))
                                                class="rounded border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">

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
                                                class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">

                                            <span>No</span>
                                        </label>

                                        <label class="flex items-start gap-3 text-sm text-sp-charcoal">
                                            <input
                                                type="radio"
                                                name="equipment_request"
                                                value="yes"
                                                @checked(old('equipment_request') === 'yes')
                                                class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">

                                            <span>Yes</span>
                                        </label>

                                        <label class="flex items-start gap-3 text-sm text-sp-charcoal">
                                            <input
                                                type="radio"
                                                name="equipment_request"
                                                value="not_sure"
                                                @checked(old('equipment_request') === 'not_sure')
                                                class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">

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
                                    class="hidden mt-4">

                                    <label
                                        for="equipment_needed"
                                        class="block font-sans text-sm font-semibold text-sp-charcoal">

                                        What equipment might you need?

                                    </label>

                                    <textarea
                                        id="equipment_needed"
                                        name="equipment_needed"
                                        rows="3"
                                        placeholder="For example: quarry boxes, sheds, rats"
                                        class="mt-2 block w-full resize-y rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen">{{ old('equipment_needed') }}</textarea>

                                    @error('equipment_needed')
                                        <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                    @enderror

                                </div>

                                {{-- Apprentice / Shadow --}}
                                <fieldset class="mt-8">

                                    <legend class="block font-sans text-sm font-semibold text-sp-charcoal">
                                        Would you like to request an apprentice or shadow judge?<span aria-hidden="true">*</span>
                                    </legend>

                                    <div class="space-y-3 mt-3">

                                        <label class="flex items-start gap-3 text-sm text-sp-charcoal">
                                            <input
                                                type="radio"
                                                name="apprentice_request"
                                                value="no"
                                                @checked(old('apprentice_request') === 'no')
                                                required
                                                class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">

                                            <span>No</span>
                                        </label>

                                        <label class="flex items-start gap-3 text-sm text-sp-charcoal">
                                            <input
                                                type="radio"
                                                name="apprentice_request"
                                                value="yes"
                                                @checked(old('apprentice_request') === 'yes')
                                                class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">

                                            <span>Yes</span>
                                        </label>

                                        <label class="flex items-start gap-3 text-sm text-sp-charcoal">
                                            <input
                                                type="radio"
                                                name="apprentice_request"
                                                value="not_sure"
                                                @checked(old('apprentice_request') === 'not_sure')
                                                class="mt-0.5 border-sp-slate text-sp-prairieGreen focus:ring-sp-prairieGreen">

                                            <span>Not sure yet</span>
                                        </label>

                                    </div>

                                    @error('apprentice_request')
                                        <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                    @enderror

                                </fieldset>

                                {{-- Apprentice / Shadow Details --}}
                                <div
                                    id="apprentice-details"
                                    class="hidden mt-4">

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
                                <p class="text-sp-clayRed mt-2">
                                    {{ $message }}
                                </p>
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

                @endif

            </div>
            {{-- End Judge Request Form Card --}}

            {{-- Image Registration --}}
            <div class="relative mt-5 h-20 hidden md:block">

                <x-public-v2.image-registration
                    text="Hamish, Photo by Blue Ridge Creative"
                    position="bottom"
                    href="https://www.blueridgeprairie.studio/" />

            </div>
            {{-- End Image Registration --}}

        </div>
        {{-- End Judge Request Content --}}

    </div>
    {{-- End Hero Content --}}

</div>
{{-- End Judge Request Hero --}}

@endsection

@section('content')

{{-- No additional content --}}

@endsection

{{-- Judge Request Conditional Fields --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const equipmentOptions = document.querySelectorAll(
            'input[name="equipment_request"]'
        );

        const equipmentDetails = document.getElementById(
            'equipment-details'
        );

        const apprenticeOptions = document.querySelectorAll(
            'input[name="apprentice_request"]'
        );

        const apprenticeDetails = document.getElementById(
            'apprentice-details'
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

        function updateApprentice() {

            const selected = document.querySelector(
                'input[name="apprentice_request"]:checked'
            );

            if (selected && selected.value === 'yes') {
                apprenticeDetails.classList.remove('hidden');
            } else {
                apprenticeDetails.classList.add('hidden');
            }
        }

        equipmentOptions.forEach(function (option) {
            option.addEventListener('change', updateEquipment);
        });

        apprenticeOptions.forEach(function (option) {
            option.addEventListener('change', updateApprentice);
        });

        updateEquipment();
        updateApprentice();

    });
</script>