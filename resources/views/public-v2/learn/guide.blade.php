@extends('public-v2.layouts.app')


@section('hero')

{{-- Learn Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 gap-6 px-6 pt-8 pb-12 md:px-8 md:pt-12 md:pb-16">

    {{-- Intro --}}
    <div class="col-span-12 md:col-span-10">

        <p class="font-display font-bold text-2xl text-sp-burntClay">
            Dog Sports 101
        </p>

        <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">
            What is NASDA, Anyway?
        </h2>

        {{-- Article Metadata --}}
        <ul class="flex flex-wrap items-center gap-x-8 gap-y-3 mt-6 text-sp-slate">

            <li class="flex items-center gap-2">

                <x-icons.folder
                    class="w-5 h-5 shrink-0"
                    aria-hidden="true" />

                <span class="body-small">
                    Dog Sports 101
                </span>

            </li>

            <li class="flex items-center gap-2">

                <x-icons.clock
                    class="w-5 h-5 shrink-0"
                    aria-hidden="true" />

                <span class="body-small">
                    8 min read
                </span>

            </li>

            <li class="flex items-center gap-2">

                <x-icons.calendar-days
                    class="w-5 h-5 shrink-0"
                    aria-hidden="true" />

                <span class="body-small">
                    Last updated August 12th, 2026
                </span>

            </li>

        </ul>
        {{-- End Article Metadata --}}

        <p class="body text-sp-slate mt-4">
            The
            <a
                href="https://nasda.dog/"
                target="_blank"
                rel="noopener noreferrer"
                class="text-link">
                North American Sport Dog Association (NASDA)
            </a>
            offers scent-based dog sports designed to show off something dogs are already incredibly good at: using their noses.
        </p>

        <p class="body text-sp-slate mt-4">
            The games are based on historic working and competitive field activities and are designed to resemble real-life situations for dogs and their handlers. Purebred or mixed breed, young or old, experienced sport dog or complete beginner—NASDA gives dogs of all kinds an opportunity to search, problem-solve, and do what comes naturally.
        </p>

        <p class="body text-sp-slate mt-4">
            It’s also an incredibly beginner-friendly dog sport. You don’t need a long list of obedience titles, specialized equipment, or years of training before you can give it a try. Your dog doesn’t have to be perfect to come play.
        </p>

    </div>

</div>

@endsection


@section('content')

{{-- Guide Content --}}
<section class="grid grid-cols-12 gap-6 px-6 pb-16 md:px-8 md:pb-24">

    {{-- Guide --}}
    <div class="col-span-12 md:col-span-10 md:col-start-1">

        {{-- Guide Hero Image --}}
        <div class="mb-12 md:mb-16">

            <img
                src="{{ asset('images/learn/what-is-nasda/featured.jpg') }}"
                alt="Placeholder guide hero image"
                class="w-full aspect-[8/3] object-cover rounded-md">

        </div>
        {{-- End Guide Hero Image --}}

        {{-- Guide Body --}}
        <div class="grid grid-cols-10 items-stretch gap-6">

            {{-- Main Guide Content --}}
            <article class="col-span-10 md:col-span-7">

                {{-- Major Guide Section --}}
                <section id="the-games">

                    <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
                        What Can My Dog Actually Do?
                    </h2>

                    <p class="body text-sp-slate mt-4">
                        NASDA isn't a single game. There are several different ways for dogs to put their noses to work, and each asks them to solve a slightly different problem. You may find that your dog loves one and couldn't care less about another. That's part of the fun.
                    </p>

                    {{-- Subsection: Trailing & Locating --}}
                    <section class="mt-8">

                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal">
                            Trailing & Locating
                        </h3>

                        <p class="font-sans text-base font-semibold text-sp-charcoal mt-1">
                            Follow the trail. Find the quarry.
                        </p>

                        <p class="body text-sp-slate mt-2">
                            Trailing & Locating asks your dog to follow a scent trail to find hidden quarry at the end. At Level I, your dog has two minutes to make the find. But don't picture a dog following a perfect line with their nose glued to the ground. Dogs can work a scent trail in different ways. Your job is to give your dog room to work it out.
                        </p>

                    </section>

                    {{-- Subsection: Trailing Brace --}}
                    <section class="mt-8">

                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal">
                            Trailing Brace
                        </h3>

                        <p class="font-sans text-base font-semibold text-sp-charcoal mt-1">
                            Follow the trail. Find the quarry. Together.
                        </p>

                        <p class="body text-sp-slate mt-2">
                            Trailing Brace puts two dogs on the trail together. Both dogs work off leash, following a scent trail to locate the quarry. Each dog needs to make the find, so while they're working as a team, they're also being evaluated individually.
                        </p>

                    </section>

                    {{-- Subsection: Urban Locating --}}
                    <section class="mt-8">

                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal">
                            Urban Locating
                        </h3>

                        <p class="font-sans text-base font-semibold text-sp-charcoal mt-1">
                            Search the area. Find the quarry
                        </p>

                        <p class="body text-sp-slate mt-2">
                            Urban Locating takes away the scent trail. Instead, your dog searches a defined area to find hidden quarry. There's no required search pattern. Your dog doesn't have to methodically work from one side of the search area to the other. Give them room to investigate, follow scent, and work toward the source in their own way.
                        </p>

                    </section>

                    {{-- Subsection: Shed Dog --}}
                    <section class="mt-8">

                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal">
                            Shed Dog
                        </h3>

                        <p class="font-sans text-base font-semibold text-sp-charcoal mt-1">
                            Find the antler. That's it.
                        </p>

                        <p class="body text-sp-slate mt-2">
                           Shed Dog asks your dog to search an area and locate a naturally shed antler. And despite the name, your dog doesn't have to retrieve it. At Level I, your dog can indicate the shed or retrieve it. Either counts as locating the hide.
                        </p>

                    </section>

                    {{-- Subsection: Lost Item --}}
                    <section class="mt-8">

                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal">
                            Lost Item
                        </h3>

                        <p class="font-sans text-base font-semibold text-sp-charcoal mt-1">
                            Your scent. Their Search
                        </p>

                        <p class="body text-sp-slate mt-2">
                            Lost Item asks your dog to search for an everyday object carrying your scent. You provide the items your dog will search for, and one is selected for the search. It's a different challenge from searching for quarry or an antler: this time, what matters is something that smells like you.
                        </p>

                    </section>

                    {{-- Subsection: Den Hunt --}}
                    <section class="mt-8">

                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal">
                            Den Hunt
                        </h3>

                        <p class="font-sans text-base font-semibold text-sp-charcoal mt-1">
                            Enter the tunnel. Find the quarry.
                        </p>

                        <p class="body text-sp-slate mt-2">
                            Den Hunt asks the dog to enter a tunnel and travel through it to locate quarry. The introductory level, Den Hunt Tested, uses a straight tunnel and is pass/fail. The dog must enter independently, reach the quarry, and remain there for the required amount of time.
                        </p>

                    </section>

                    {{-- Development Callout --}}
<div class="mt-8 rounded-md border border-sp-warmStone bg-sp-limestone p-5 md:p-6">

    <div class="flex items-start gap-4">

        <x-icons.notebook-dot
            class="mt-0.5 h-6 w-6 shrink-0 text-sp-prairieOchre"
            aria-hidden="true" />

        <div>

            <h3 class="font-sans text-xl font-semibold text-sp-charcoal">
                Still In Development
            </h3>

            <p class="body text-sp-slate mt-4">
                Den Hunt is currently still in development. The rules and requirements are still being field tested, and adjusted.
            </p>

        </div>

    </div>

</div>
{{-- End Development Callout --}}

             
                </section>

                {{-- Major Guide Section --}}
                <section
                    id="training"
                    class="mt-16">

                    <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
                        Training
                    </h2>

                    <p class="body text-sp-slate mt-4">
                        Placeholder content for the next major section of the guide.
                    </p>

                </section>

                {{-- Major Guide Section --}}
                <section
                    id="your-first-trial"
                    class="mt-16">

                    <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
                        Your First Trial
                    </h2>

                    <p class="body text-sp-slate mt-4">
                        Placeholder content for this section of the guide.
                    </p>

                </section>

                {{-- Major Guide Section --}}
                <section
                    id="scoring-levels"
                    class="mt-16">

                    <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
                        Scoring &amp; Levels
                    </h2>

                    <p class="body text-sp-slate mt-4">
                        Placeholder content for this section of the guide.
                    </p>

                </section>

                {{-- Major Guide Section --}}
                <section
                    id="what-to-expect"
                    class="mt-16">

                    <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
                        What to Expect
                    </h2>

                    <p class="body text-sp-slate mt-4">
                        Placeholder content for this section of the guide.
                    </p>

                </section>

                {{-- Major Guide Section --}}
                <section
                    id="what-to-bring"
                    class="mt-16">

                    <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
                        What to Bring
                    </h2>

                    <p class="body text-sp-slate mt-4">
                        Placeholder content for this section of the guide.
                    </p>

                </section>

                {{-- Major Guide Section --}}
                <section
                    id="getting-started"
                    class="mt-16">

                    <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
                        Getting Started
                    </h2>

                    <p class="body text-sp-slate mt-4">
                        Placeholder content for this section of the guide.
                    </p>

                </section>

                <section>
                    CTA: Request a Workshop
                </section>

            </article>

            {{-- Supporting Figures --}}
            <aside class="col-span-10 self-start md:col-span-3">

                <figure>

                    <img
                        src="{{ asset('images/learn/what-is-nasda/trailing-and-locating.jpg') }}"
                        alt="Placeholder supporting image"
                        class="block w-full aspect-[4/3] object-cover rounded-md">

                    <figcaption class="mt-3">

                        <p class="font-display text-sm text-sp-prairieOchre uppercase">
                            Figure 01
                        </p>

                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal mt-1">
                            Supporting Figure Title
                        </h3>

                        <p class="body text-sp-slate mt-2">
                            Short description of the image goes here.
                        </p>

                        <p class="body-small text-sp-slate mt-2">
                            Photo: Photographer Name
                        </p>

                    </figcaption>

                </figure>

                <figure class="mt-10">

                    <img
                        src="{{ asset('images/learn/what-is-nasda/trailing-brace.jpg') }}"
                        alt="Placeholder supporting image"
                        class="block w-full aspect-[4/3] object-cover rounded-md">

                    <figcaption class="mt-3">

                        <p class="font-display text-sm text-sp-prairieOchre uppercase">
                            Figure 02
                        </p>

                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal mt-1">
                            Another Supporting Figure
                        </h3>

                        <p class="body text-sp-slate mt-2">
                            Another short description of the image goes here.
                        </p>

                        <p class="body-small text-sp-slate mt-2">
                            Photo: Photographer Name
                        </p>

                    </figcaption>

                </figure>

            </aside>

        </div>
        {{-- End Guide Body --}}



    </div>


    {{-- Guide Navigation --}}
    <aside
        class="hidden md:col-span-2 md:col-start-11 md:block md:self-start md:sticky md:top-8 md:border-l md:border-sp-warmStone md:pl-6"
        aria-label="Guide navigation">

        <nav>

            <p class="font-display font-bold text-2xl text-sp-prairieGreen uppercase">
                In This Guide
            </p>

            <ul class="flex flex-col gap-4 mt-2">

                <li>
                    <a
                        href="#the-games"
                        data-guide-nav
                        class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                        The Games
                    </a>
                </li>

                <li>
                    <a
                        href="#training"
                        data-guide-nav
                        class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                        Training
                    </a>
                </li>

                <li>
                    <a
                        href="#your-first-trial"
                        data-guide-nav
                        class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                        Your First Trial
                    </a>
                </li>

                <li>
                    <a
                        href="#scoring-levels"
                        data-guide-nav
                        class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                        Scoring &amp; Levels
                    </a>
                </li>

                <li>
                    <a
                        href="#what-to-expect"
                        data-guide-nav
                        class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                        What to Expect
                    </a>
                </li>

                <li>
                    <a
                        href="#what-to-bring"
                        data-guide-nav
                        class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                        What to Bring
                    </a>
                </li>

                <li>
                    <a
                        href="#getting-started"
                        data-guide-nav
                        class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                        Getting Started
                    </a>
                </li>

            </ul>

        </nav>

    </aside>
    {{-- End Guide Navigation --}}

</section>
{{-- End Guide Content --}}

@endsection


<script>
    document.addEventListener('DOMContentLoaded', () => {

        const navLinks = document.querySelectorAll('[data-guide-nav]');

        if (!navLinks.length) {
            return;
        }

        const guideSections = Array.from(navLinks)
            .map(link => document.querySelector(link.getAttribute('href')))
            .filter(Boolean);

        if (!guideSections.length) {
            return;
        }

        const setActiveSection = (id) => {

            navLinks.forEach(link => {

                const isActive = link.getAttribute('href') === `#${id}`;

                link.classList.toggle('is-active', isActive);

                if (isActive) {
                    link.setAttribute('aria-current', 'location');
                } else {
                    link.removeAttribute('aria-current');
                }

            });

        };

        const observer = new IntersectionObserver(
            (entries) => {

                const visibleSections = entries
                    .filter(entry => entry.isIntersecting)
                    .sort(
                        (a, b) =>
                        a.boundingClientRect.top - b.boundingClientRect.top
                    );

                if (visibleSections.length) {
                    setActiveSection(visibleSections[0].target.id);
                }

            }, {
                rootMargin: '-20% 0px -65% 0px',
                threshold: 0
            }
        );

        guideSections.forEach(section => {
            observer.observe(section);
        });

    });
</script>