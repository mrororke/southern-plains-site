@extends('public-v2.layouts.app')

@section('meta_title', 'Dog Training & Dog Sports in Oklahoma | Southern Plains Sport Dog Club')
@section('meta_description', 'Positive reinforcement dog training, dog sports, events, and resources in Oklahoma. Play, train, and grow with Southern Plains Sport Dog Club.')
@section('og_title', 'Do Great Things With Your Dog | Southern Plains Sport Dog Club')
@section('og_description', 'Positive reinforcement training, dog sports, events, and a community built around doing more with your dog.')
@section('og_image', asset('images/og/home.jpg'))
@section('canonical_url', 'https://southernplains.dog/')

@section('structured_data')
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Southern Plains Sport Dog Club, LLC",
        "url": "https://southernplains.dog/",
        "logo": "https://southernplains.dog/images/logo.svg",
        "email": "southernplainssportdogclub@gmail.com",
        "areaServed": {
            "@type": "AdministrativeArea",
            "name": "Northeast Oklahoma"
        },
        "sameAs": [
            "https://www.facebook.com/southernplainsportdogclub",
            "https://www.instagram.com/southernplainssdc/",
            "https://www.youtube.com/@southernplainssportdogs"
        ]
    }
</script>
@endsection

@section('content')

{{-- Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 pt-8">

    <div class="col-span-12 md:col-span-5 md:pr-0 pl-8 pr-8">

        <p class="text-eyebrow">
            Dog Sports
        </p>

        <h1 class="text-hero">
            Your dog was Made to do Stuff.
            </span>
        </h1>

        <div class="hl-break">
            <hr>
        </div>

        <p class="body-large">
            Dogs sniff. Search. Chase. Explore. Solve problems. Dog sports give those natural instincts somewhere to go — and give you something pretty great to do together.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 py-6">

            <a
                href="#discover"
                class="btn-primary">
                Discovery Dog Sports
            </a>

            <a
                href="{{ route('public-v2.events.index') }}"
                class="btn-primary-outline">
                View Upcoming Events
            </a>

        </div>

    </div>

    <div class="col-span-12 mt-8 md:col-span-7 md:mt-0 relative">

        <img
            class="w-full h-full"
            src="{{ asset('images/headers/header-dog-sports.png') }}"
            alt="Brindle and white English bulldog trotting through OKlahoma wildflowers.">

        <x-public-v2.image-registration
            text="Hazel, Photo by Blue Ridge Creative"
            position="right"
            href="https://www.blueridgeprairie.studio/" />
    </div>

</div>




@endsection