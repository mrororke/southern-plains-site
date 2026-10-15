@extends('public-v2.layouts.app')

@section('meta_title', 'Request an Intro to NASDA Workshop | Southern Plains Sport Dog Club')
@section('meta_description', 'Bring NASDA to your dog training club! Request a three-hour introductory workshop covering Shed Dog, Trailing & Locating, Urban Locating, and Lost Item.')

@section('og_title', 'Bring NASDA to Your Club | Southern Plains Sport Dog Club')
@section('og_description', 'Introduce your club to NASDA with a hands-on, three-hour workshop covering all four Level 1 components. No previous NASDA experience required.')

@section('og_image', asset('images/og/default.jpg'))
@section('canonical_url', 'https://southernplains.dog/inquiries/workshop')

@section('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "Request an Intro to NASDA Workshop",
    "description": "Request a three-hour Intro to NASDA workshop for your dog training club or organization.",
    "url": "https://southernplains.dog/inquiries/workshop",
    "isPartOf": {
        "@type": "WebSite",
        "name": "Southern Plains Sport Dog Club",
        "url": "https://southernplains.dog/"
    },
    "about": {
        "@type": "Thing",
        "name": "North American Sport Dog Association (NASDA)"
    }
}
</script>
@endsection



@section('hero')
{{-- Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 pt-8">

    <div class="col-span-12 md:col-span-5 md:pr-0 pl-8 pr-8">

        <p class="text-eyebrow">
            Let's train together.
        </p>

        <h1 class="text-hero">
            Bring NASDA<br/> to Your Club
            </span>
        </h1>

        <div class="hl-break">
            <hr>
        </div>

        <h3 class="text-sp-charcoal font-semibold text-2xl pb-8">
            Interested in hosting an Intro to NASDA workshop for your club or training group? I’d love to help!
        </h3>

        <p class="body-large text-sp-slate">
           Whether your group is brand new to NASDA or looking to get more comfortable with the basics, tell me a little about your group and what you’re hoping to accomplish, and we’ll see what we can put together.
        </p>

        
    </div>

    <div class="col-span-12 mt-8 md:col-span-7 md:mt-0 relative">

        <img
            class="w-full h-full"
            src="{{ asset('images/headers/hamish-workshop-hero-transparent.png') }}"
            alt="Hamish, a Sheltie, inspecting a quarry box.">

        <x-public-v2.image-registration
            text="Hamish, Photo by Blue Ridge Creative"
            position="right"
            href="https://www.blueridgeprairie.studio/" />
    </div>

</div>
{{-- end hero --}}
@endsection

@section('content')

@section('content')


{{-- Begin content --}}

<div class="grid grid-cols-12 gap-y-10 md:gap-y-0 py-[64px] px-8">
    <div class="col-span-12 md:col-span-7 gap-4 flex">
        Left Side
    </div>
    <div class="col-span-12 md:col-span-5 gap-4 flex">
        Right Side
    </div>
</div>
{{-- Begin content --}}



<section id="workshop-request" class="py-16">

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        {{-- Workshop Information --}}
        <div class="lg:col-span-7">

            <p class="text-eyebrow-small">
                A Hands-On Introduction
            </p>

            <h2 class="text-section-heading text-sp-charcoal mt-4">
                Let's Get Your Dogs Playing!
            </h2>

            <div class="mt-6 space-y-6">

                <p class="body text-sp-slate">
                    NASDA is a great way to introduce dogs and handlers to something new.
                    Our three-hour Intro to NASDA workshop gives participants a chance
                    to learn the basics and try the games themselves.
                </p>

                <p class="body text-sp-slate">
                    We'll cover an overview of NASDA, the rules and expectations,
                    and hands-on practice with the four Level 1 components:
                    Shed Dog, Trailing &amp; Locating, Urban Locating, and Lost Item.
                </p>

                <p class="body text-sp-slate">
                    We can discuss your group's experience, available space,
                    and what you'd like to accomplish to make the workshop
                    a great fit for your club.
                </p>

            </div>


            {{-- Workshop Photograph --}}
            <div class="mt-10 relative">

                <img
                    src="{{ asset('images/REPLACE-WITH-WORKSHOP-PHOTO.jpg') }}"
                    alt="Hamish practicing Shed Dog in a field of wildflowers."
                    class="w-full rounded-md">

                <x-public-v2.image-registration
                    text="Hamish, Photo by Blue Ridge Creative"
                    position="left"
                    href="https://www.blueridgeprairie.studio/" />

            </div>


            {{-- Workshop Features --}}
            <ul class="grid grid-cols-2 lg:grid-cols-4 gap-6 mt-10">

                {{-- Introduction --}}
                <li class="flex flex-col items-center text-center">

                    <div class="w-20 h-20 rounded-full bg-sp-limestone flex items-center justify-center mb-4">
                        <i data-lucide="book-open" class="w-10 h-10 text-sp-burntClay"></i>
                    </div>

                    <h3 class="font-sans font-semibold text-sm uppercase text-sp-charcoal leading-tight">
                        Introduction<br>to NASDA
                    </h3>

                    <p class="body-small text-sp-slate mt-3">
                        Overview of the sport, rules, and expectations.
                    </p>

                </li>


                {{-- Four Components --}}
                <li class="flex flex-col items-center text-center">

                    <div class="w-20 h-20 rounded-full bg-sp-limestone flex items-center justify-center mb-4">
                        <i data-lucide="paw-print" class="w-10 h-10 text-sp-burntClay"></i>
                    </div>

                    <h3 class="font-sans font-semibold text-sm uppercase text-sp-charcoal leading-tight">
                        Four Level 1<br>Components
                    </h3>

                    <p class="body-small text-sp-slate mt-3">
                        Shed, Trailing &amp; Locating,
                        Urban Locating, and Lost Item.
                    </p>

                </li>


                {{-- Participation --}}
                <li class="flex flex-col items-center text-center">

                    <div class="w-20 h-20 rounded-full bg-sp-limestone flex items-center justify-center mb-4">
                        <i data-lucide="users-round" class="w-10 h-10 text-sp-burntClay"></i>
                    </div>

                    <h3 class="font-sans font-semibold text-sm uppercase text-sp-charcoal leading-tight">
                        Hands-On<br>Participation
                    </h3>

                    <p class="body-small text-sp-slate mt-3">
                        Work with your own dog, or observe.
                    </p>

                </li>


                {{-- Tailored --}}
                <li class="flex flex-col items-center text-center">

                    <div class="w-20 h-20 rounded-full bg-sp-limestone flex items-center justify-center mb-4">
                        <i data-lucide="messages-square" class="w-10 h-10 text-sp-burntClay"></i>
                    </div>

                    <h3 class="font-sans font-semibold text-sm uppercase text-sp-charcoal leading-tight">
                        Tailored to<br>Your Group
                    </h3>

                    <p class="body-small text-sp-slate mt-3">
                        We'll discuss your goals and available space.
                    </p>

                </li>

            </ul>

        </div>


        {{-- Workshop Request Form --}}
        <div class="lg:col-span-5">

            <div class="bg-sp-limestone rounded-md p-8 lg:p-10">

                <p class="text-sp-burntClay uppercase text-xs mb-3">
                    Workshop Request
                </p>

                <h2 class="font-sans font-semibold text-3xl text-sp-charcoal mb-6">
                    Tell Me More About Your Group
                </h2>


                {{-- Submission Confirmation --}}
                @if (session('success'))

                    <div class="mb-8">

                        <p class="font-sans font-semibold text-sp-charcoal mb-3">
                            {{ session('success.title') }}
                        </p>

                        <p class="body text-sp-slate whitespace-pre-line">
                            {{ session('success.message') }}
                        </p>

                    </div>

                @else

                    <form
                        method="POST"
                        action="{{ route('public-v2.inquiries.workshop.store') }}"
                        class="space-y-5">

                        @csrf

                        {{-- Name --}}
                        <div>
                            <label for="name" class="block mb-2">
                                Your Name*
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                class="w-full rounded-md">

                            @error('name')
                                <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- Email --}}
                        <div>
                            <label for="email" class="block mb-2">
                                Email Address*
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                class="w-full rounded-md">

                            @error('email')
                                <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- Organization --}}
                        <div>
                            <label for="organization" class="block mb-2">
                                Club or Organization
                            </label>

                            <input
                                type="text"
                                id="organization"
                                name="organization"
                                value="{{ old('organization') }}"
                                class="w-full rounded-md">

                            @error('organization')
                                <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- City and State --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                            <div>
                                <label for="city" class="block mb-2">
                                    City*
                                </label>

                                <input
                                    type="text"
                                    id="city"
                                    name="city"
                                    value="{{ old('city') }}"
                                    required
                                    class="w-full rounded-md">

                                @error('city')
                                    <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="state" class="block mb-2">
                                    State*
                                </label>

                                <input
                                    type="text"
                                    id="state"
                                    name="state"
                                    value="{{ old('state') }}"
                                    required
                                    class="w-full rounded-md">

                                @error('state')
                                    <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>


                        {{-- Participants --}}
                        <div>
                            <label for="participants" class="block mb-2">
                                Approximate Number of Participants*
                            </label>

                            <input
                                type="number"
                                id="participants"
                                name="participants"
                                min="1"
                                value="{{ old('participants') }}"
                                required
                                class="w-full rounded-md">

                            @error('participants')
                                <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- Preferred Timeframe --}}
                        <div>
                            <label for="preferred_timeframe" class="block mb-2">
                                Preferred Date or Timeframe
                            </label>

                            <input
                                type="text"
                                id="preferred_timeframe"
                                name="preferred_timeframe"
                                placeholder="e.g. Spring 2027"
                                value="{{ old('preferred_timeframe') }}"
                                class="w-full rounded-md">

                            @error('preferred_timeframe')
                                <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- NASDA Experience --}}
                        <div>
                            <label for="nasda_experience" class="block mb-2">
                                Does Your Club Have Experience With NASDA?
                            </label>

                            <select
                                id="nasda_experience"
                                name="nasda_experience"
                                class="w-full rounded-md">

                                <option value="">Select an option</option>

                                <option value="Completely new to NASDA"
                                    @selected(old('nasda_experience') === 'Completely new to NASDA')>
                                    Completely new to NASDA
                                </option>

                                <option value="Some experience"
                                    @selected(old('nasda_experience') === 'Some experience')>
                                    Some experience
                                </option>

                                <option value="Experienced participants"
                                    @selected(old('nasda_experience') === 'Experienced participants')>
                                    Experienced participants
                                </option>

                            </select>

                            @error('nasda_experience')
                                <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- Message --}}
                        <div>
                            <label for="message" class="block mb-2">
                                Tell Me More*
                            </label>

                            <textarea
                                id="message"
                                name="message"
                                rows="5"
                                required
                                class="w-full rounded-md">{{ old('message') }}</textarea>

                            @error('message')
                                <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- Submit --}}
                        <button type="submit" class="btn-primary w-full">
                            Send Workshop Request
                            <i data-lucide="arrow-right" class="w-5 h-5"></i>
                        </button>


                        <p class="body-small text-sp-slate">
                            Submitting a request does not reserve a date or
                            commit you to hosting a workshop. Workshop details,
                            availability, and pricing will be discussed after
                            reviewing your request.
                        </p>

                    </form>

                @endif

            </div>

        </div>

    </div>

</section>

@endsection