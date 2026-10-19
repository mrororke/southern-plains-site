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
        "@type": "WebSite",
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
    class="relative overflow-hidden">



    {{-- Hero Content --}}
    <div
        class="relative grid grid-cols-12 gap-6 px-6 pt-8 pb-12 md:px-8 md:pt-12 md:pb-16">

        {{-- Intro --}}
        <div class="col-span-12 md:col-span-7">

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


            {{-- Contact Form Card --}}
            <div class="mt-8 max-w-xl rounded-md bg-sp-limestone p-6 md:p-8">

                <p class="font-sans text-2xl font-semibold text-sp-charcoal">
                    Send A Message
                </p>


                {{-- Form --}}
                <form
                    method="POST"
                    action="#"
                    class="space-y-5 mt-6">

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


                    {{-- Name --}}
                    <div>

                        <label
                            for="name"
                            class="block text-sp-slate text-sm mb-2">

                            Your Name *

                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            required
                            class="w-full rounded-md">

                    </div>


                    {{-- Email --}}
                    <div>

                        <label
                            for="email"
                            class="block text-sp-slate text-sm mb-2">

                            Email Address *

                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            required
                            class="w-full rounded-md">

                    </div>


                    {{-- Inquiry --}}
                    <div>

                        <label
                            for="inquiry_type"
                            class="block text-sp-slate text-sm mb-2">

                            What is your inquiry about? *

                        </label>

                        <select
                            id="inquiry_type"
                            name="inquiry_type"
                            required
                            class="w-full rounded-md">

                            <option value="">
                                Select a topic
                            </option>

                            <option value="General Question">
                                General Question
                            </option>

                            <option value="Dog Sports / NASDA">
                                Dog Sports / NASDA
                            </option>

                            <option value="Events / Trial Information">
                                Events / Trial Information
                            </option>

                            <option value="Private Training / Behavior Consultation">
                                Private Training / Behavior Consultation
                            </option>

                            <option value="Classes / Training">
                                Classes / Training
                            </option>

                            <option value="Workshops">
                                Workshops
                            </option>

                            <option value="Membership / Volunteer Information">
                                Membership / Volunteer Information
                            </option>

                            <option value="Sponsorship / Partnership">
                                Sponsorship / Partnership
                            </option>

                            <option value="Other">
                                Other
                            </option>

                        </select>

                    </div>


                    {{-- Message --}}
                    <div>

                        <label
                            for="message"
                            class="block text-sp-slate text-sm mb-2">

                            Message / Question *

                        </label>

                        <textarea
                            id="message"
                            name="message"
                            rows="6"
                            required
                            class="w-full rounded-md"></textarea>

                    </div>


                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="btn-primary w-full">

                        Send Message

                        <x-icons.move-right
                            class="w-5 h-5 shrink-0"
                            aria-hidden="true" />

                    </button>

                </form>
                {{-- End Form --}}

            </div>
            {{-- End Contact Form Card --}}

        </div>


        {{-- Image Registration --}}
        <div
            class="col-span-12 md:col-span-5 relative">

            <x-public-v2.image-registration
                text="Hamish, Photo by Blue Ridge Creative"
                position="right"
                href="https://www.blueridgeprairie.studio/" />

        </div>

    </div>

    {{-- Hero Image --}}
    <div class="col-span-12 md:col-span-5 mt-8 md:mt-0 relative">

        <img
            src="{{ asset('images/headers/hamish-contact-transparent.png') }}"
            alt="Hamish, a Sheltie, standing among wildflowers."
            class="block w-full h-full object-cover object-center">

        <x-public-v2.image-registration
            text="Hamish, Photo by Blue Ridge Creative"
            position="right"
            href="https://www.blueridgeprairie.studio/" />

    </div>

</div>
{{-- End Contact Hero --}}

@endsection


@section('content')

{{-- Other Ways To Connect --}}
<section
    class="grid grid-cols-12 gap-6 px-6 py-12 md:px-8 md:py-16">

    <div class="col-span-12">

        <h2 class="font-sans text-2xl font-semibold text-sp-charcoal">
            Other Ways To Connect
        </h2>


        {{-- Connection Options --}}
        <div class="grid grid-cols-1 gap-10 mt-10 md:grid-cols-3 md:gap-8">


            {{-- Workshops --}}
            <div class="flex items-start gap-4">

                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-sp-limestone">

                    <x-icons.calendar-days
                        class="h-6 w-6 text-sp-prairieGreen"
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
                        class="inline-flex items-center gap-2 mt-4 font-sans text-sm font-semibold uppercase tracking-wide text-sp-prairieGreen transition-colors hover:text-sp-prairieOchre">

                        Request A Workshop

                        <x-icons.move-right
                            class="w-5 h-5 shrink-0"
                            aria-hidden="true" />

                    </a>

                </div>

            </div>


            {{-- Judge Requests --}}
            <div class="flex items-start gap-4">

                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-sp-limestone">

                    <x-icons.calendar-days
                        class="h-6 w-6 text-sp-prairieGreen"
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
                        class="inline-flex items-center gap-2 mt-4 font-sans text-sm font-semibold uppercase tracking-wide text-sp-prairieGreen transition-colors hover:text-sp-prairieOchre">

                        Request A Judge

                        <x-icons.move-right
                            class="w-5 h-5 shrink-0"
                            aria-hidden="true" />

                    </a>

                </div>

            </div>


            {{-- Trial Requests --}}
            <div class="flex items-start gap-4">

                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-sp-limestone">

                    <x-icons.calendar-days
                        class="h-6 w-6 text-sp-prairieGreen"
                        aria-hidden="true" />

                </div>

                <div>

                    <h3 class="font-sans text-lg font-semibold text-sp-charcoal">
                        Trial Requests
                    </h3>

                    <p class="body text-sp-slate mt-2">
                        Want to bring NASDA to your venue? We are made to travel and are happy to host a trial, with equipment options to fit your event.
                    </p>

                    <a
                        href="#"
                        class="inline-flex items-center gap-2 mt-4 font-sans text-sm font-semibold uppercase tracking-wide text-sp-prairieGreen transition-colors hover:text-sp-prairieOchre">

                        Request A Trial

                        <x-icons.move-right
                            class="w-5 h-5 shrink-0"
                            aria-hidden="true" />

                    </a>

                </div>

            </div>

        </div>
        {{-- End Connection Options --}}

    </div>

</section>
{{-- End Other Ways To Connect --}}

@endsection