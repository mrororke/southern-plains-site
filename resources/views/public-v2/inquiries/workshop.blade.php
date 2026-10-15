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
            Bring NASDA to Your Club
            </span>
        </h1>

        <div class="hl-break">
            <hr>
        </div>

        <h3 class="text-sp-charcoal font-semibold text-xl">
            Interested in hosting an Intro to NASDA workshop for your club or training group? I’d love to help!
        </h3>

        <p class="body-large text-sp-slate">
           Whether your group is brand new to NASDA or looking to get more comfortable with the basics, tell me a little about your group and what you’re hoping to accomplish, and we’ll see what we can put together.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 py-6">

            <a
                href="#workshop-requet"
                class="btn-primary">
                Request a Workshop
            </a>


        </div>

    </div>

    <div class="col-span-12 mt-8 md:col-span-7 md:mt-0 relative">

        <img
            class="w-full h-full"
            src="{{ asset('images/headers/inquiry-workshop.png') }}"
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

yay for content



@endsection