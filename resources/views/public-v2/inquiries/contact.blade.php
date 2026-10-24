@extends('public-v2.layouts.app')


@section('meta_title', 'Contact Southern Plains Sport Dog Club')

@section('meta_description', 'Have a question about training, dog sports, events, or Southern Plains Sport Dog Club? Get in touch and send us a message.')


@section('og_title', 'Get In Touch With Southern Plains | Southern Plains Sport Dog Club')

@section('og_description', 'Have a question about training, dog sports, events, or Southern Plains Sport Dog Club? Send us a message.')

@section('og_image', asset('images/og/default.jpg'))

@section('canonical_url', 'https://southernplains.dog/inquiries/contact')


@section('structured_data')

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ContactPage",
    "name": "Contact Southern Plains Sport Dog Club",
    "description": "Get in touch with Southern Plains Sport Dog Club about training, dog sports, events, and other inquiries.",
    "url": "https://southernplains.dog/inquiries/contact",
    "isPartOf": {
        "@type": "Website",
        "name": "Southern Plains Sport Dog Club",
        "url": "https://southernplains.dog/"
    }
}
</script>

@endsection


@section('hero')

{{-- Contact Hero --}}
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

        {{-- Intro + Form --}}
        <div class="col-span-12 md:col-span-7">

            {{-- Contact Form Card --}}
            <div class="mt-8 max-w-xl rounded-md bg-sp-limestone p-6 md:mt-16 md:p-8">

                {{-- Intro --}}
            <p class="font-display font-bold text-2xl text-sp-burntClay">
                Ask Us Anything
            </p>

            <h1 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">
                Get In Touch With<br class="hidden md:block" />
                Southern Plains.
            </h1>

            <p class="body-large text-sp-slate mt-4 max-w-xl">
                Have a question about training, dog sports, an upcoming event, or something else? Send us a message and we’ll get back to you.
            </p>


                {{-- Contact Form --}}
                <form
                    action="#"
                    method="POST"
                    class="mt-6">

                    @csrf

                    {{-- Name --}}
                    <div>

                        <label
                            for="name"
                            class="block font-sans text-sm font-semibold text-sp-charcoal">

                            Your Name<span aria-hidden="true">*</span>

                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            autocomplete="name"
                            required
                            placeholder="Your Name"
                            class="mt-2 block w-full rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen">

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
                            required
                            placeholder="Your email address"
                            class="mt-2 block w-full rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen">

                    </div>


                    {{-- Inquiry Type --}}
                    <div class="mt-4">

                        <label
                            for="inquiry"
                            class="block font-sans text-sm font-semibold text-sp-charcoal">

                            What is your inquiry about?<span aria-hidden="true">*</span>

                        </label>

                        <select
                            id="inquiry"
                            name="inquiry"
                            required
                            class="mt-2 block w-full rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen">

                            <option value="" selected disabled>
                                Select a topic
                            </option>

                            <option value="general">
                                General Question
                            </option>

                            <option value="training">
                                Training & Classes
                            </option>

                            <option value="sports">
                                Dog Sports & NASDA
                            </option>

                            <option value="events">
                                Events & Workshops
                            </option>

                            <option value="other">
                                Other
                            </option>
                        </select>

                    </div>


                    {{-- Message --}}
                    <div class="mt-4">

                        <label
                            for="message"
                            class="block font-sans text-sm font-semibold text-sp-charcoal">

                            Message / Question<span aria-hidden="true">*</span>

                        </label>

                        <textarea
                            id="message"
                            name="message"
                            rows="7"
                            required
                            placeholder="Tell us how we can help."
                            class="mt-2 block w-full resize-y rounded-md border border-sp-slate bg-white px-3 py-3 font-sans text-sm text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen"></textarea>

                    </div>


                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="mt-4 inline-flex w-full items-center justify-center gap-2 rounded-md bg-sp-prairieGreen px-5 py-3 font-sans text-sm font-semibold uppercase tracking-wide text-white transition-colors hover:bg-sp-prairieGreen/90">

                        Send Message

                        <x-icons.move-right
                            class="h-5 w-5 shrink-0"
                            aria-hidden="true" />

                    </button>

                </form>
                {{-- End Contact Form --}}

            </div>
            {{-- End Contact Form Card --}}

        </div>
        {{-- End Intro + Form --}}
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
{{-- End Contact Hero --}}

@endsection


@section('content')

{{-- Other Ways To Connect --}}
<section class="px-6 py-12 md:px-8 md:py-16">

    <div class="grid grid-cols-12 gap-6">

        <div class="col-span-12">

            <h2 class="font-sans text-2xl font-semibold text-sp-charcoal">
                Other Ways To Connect
            </h2>

        </div>


        {{-- Workshops --}}
        <div class="col-span-12 md:col-span-4">

            <div class="flex items-start gap-4">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-sp-sage/30 text-sp-prairieGreen">

                    <x-icons.calendar-plus
                        class="h-5 w-5"
                        aria-hidden="true" />

                </div>

                <div>

                    <h3 class="font-sans text-lg font-semibold text-sp-charcoal">
                        Workshops
                    </h3>

                    <p class="body text-sp-slate mt-2">
                        Interested in hosting a workshop? Use our workshop request form to share the details, and we’ll work with you to plan a great experience for your group.
                    </p>

                    <a
                        href="#"
                        class="mt-3 inline-flex items-center gap-2 font-sans text-sm font-semibold uppercase tracking-wide text-sp-prairieGreen transition-colors hover:text-sp-prairieOchre">

                        Request A Workshop

                        <x-icons.move-right
                            class="h-5 w-5 shrink-0"
                            aria-hidden="true" />

                    </a>

                </div>

            </div>

        </div>
        {{-- End Workshops --}}


        {{-- Judge Requests --}}
        <div class="col-span-12 md:col-span-4">

            <div class="flex items-start gap-4">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-sp-sage/30 text-sp-prairieGreen">

                    <x-icons.calendar-plus
                        class="h-5 w-5"
                        aria-hidden="true" />

                </div>

                <div>

                    <h3 class="font-sans text-lg font-semibold text-sp-charcoal">
                        Judge Requests
                    </h3>

                    <p class="body text-sp-slate mt-2">
                        Would you like to ask Melanie to judge your event? Send us the details, and let’s talk about your event and what you need.
                    </p>

                    <a
                        href="#"
                        class="mt-3 inline-flex items-center gap-2 font-sans text-sm font-semibold uppercase tracking-wide text-sp-prairieGreen transition-colors hover:text-sp-prairieOchre">

                        Request A Judge

                        <x-icons.move-right
                            class="h-5 w-5 shrink-0"
                            aria-hidden="true" />

                    </a>

                </div>

            </div>

        </div>
        {{-- End Judge Requests --}}


        {{-- Trial Requests --}}
        <div class="col-span-12 md:col-span-4">

            <div class="flex items-start gap-4">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-sp-sage/30 text-sp-prairieGreen">

                    <x-icons.calendar-plus
                        class="h-5 w-5"
                        aria-hidden="true" />

                </div>

                <div>

                    <h3 class="font-sans text-lg font-semibold text-sp-charcoal">
                        Trial Requests
                    </h3>

                    <p class="body text-sp-slate mt-2">
                        Want to bring NASDA to your venue? We are made to travel, and happy to host a trial, with equipment options to fit your event.
                    </p>

                    <a
                        href="#"
                        class="mt-3 inline-flex items-center gap-2 font-sans text-sm font-semibold uppercase tracking-wide text-sp-prairieGreen transition-colors hover:text-sp-prairieOchre">

                        Request A Trial

                        <x-icons.move-right
                            class="h-5 w-5 shrink-0"
                            aria-hidden="true" />

                    </a>

                </div>

            </div>

        </div>
        {{-- End Trial Requests --}}

    </div>

</section>
{{-- End Other Ways To Connect --}}

@endsection