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

    <div class="col-span-12 md:col-span-4 md:pr-0 pl-8 pr-8">

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

        <h3 class="text-sp-charcoal font-semibold text-2xl">
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

    <div class="col-span-12 mt-8 md:col-span-8 md:mt-0 relative">

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

yay for content



@endsection