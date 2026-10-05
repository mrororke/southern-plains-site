@extends('public-v2.layouts.app')

@section('hero')

{{-- Learn Hero --}}
@section('hero')

<x-public-v2.learn-hero
    :filters="[
        [
            'label' => 'All',
            'href' => '#',
            'active' => true,
        ],
        [
            'label' => 'Dog Sports',
            'href' => '#',
        ],
        [
            'label' => 'Handler Insights',
            'href' => '#',
        ],
        [
            'label' => 'Training Tips',
            'href' => '#',
        ],
        [
            'label' => 'Book Reviews',
            'href' => '#',
        ],
    ]" />

@endsection
{{-- End Learn Hero --}}


@section('content')
{{-- Featured Article --}}
<section class="px-6 py-12 md:px-8 md:py-16 bg-sp-warmIvory">

    <article class="grid grid-cols-12 gap-6 rounded-md border border-sp-warmStone bg-sp-limestone p-4 md:p-6">

        {{-- Featured Image --}}
        <div class="col-span-12 md:col-span-7">

            <img
                src="{{ asset('images/learn/what-is-nasda/featured.jpg') }}"
                alt="Hamish, a black and white Sheltie, investigating a NASDA quarry box."
                class="w-full aspect-[16/9] object-cover rounded-md">

        </div>

        {{-- Featured Content --}}
        <div class="col-span-12 md:col-span-5 flex items-center md:px-6">

            <div>

                <p class="font-display font-bold text-lg text-sp-prairieOchre uppercase">
                    Dog Sports 101
                </p>

                <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">
                    What Is NASDA, Anyway?
                </h2>

                <p class="body text-sp-slate mt-6 md:body-large">
                    From searching for lost objects to trailing and locating rats, NASDA lets dogs use their noses, independence, and problem solving skills in exciting and rewarding ways.
                </p>

                <a
                    href="{{ route('public-v2.learn.guide') }}"
                    class="learn-more-link text-sp-prairieOchre mt-4">
                    Read the Guide
                    <x-icons.move-right />
                </a>

            </div>

        </div>

    </article>

</section>
{{-- End Featured Article --}}

{{-- Learn Articles --}}
<section class="grid grid-cols-12 items-start gap-6 px-6 pb-12 md:px-8 md:pb-16">

    {{-- Article Card --}}
    <article class="col-span-12 md:col-span-4 flex flex-col rounded-md border border-sp-warmStone p-4">

        {{-- Article Image --}}
        <img
            src="{{ asset('images/learn/what-is-nasda/featured.jpg') }}"
            alt="Hamish, a black and white Sheltie, investigating a NASDA quarry box."
            class="w-full aspect-[16/9] object-cover rounded-md">

        {{-- Article Content --}}
        <div class="flex flex-col flex-1 pt-6">

            <p class="font-display font-bold text-lg text-sp-prairieOchre uppercase">
                Dog Sports 101
            </p>

            <h2 class="font-sans text-2xl font-semibold text-sp-charcoal mt-2">
                What Is NASDA, Anyway?
            </h2>

            <p class="body text-sp-slate mt-4">
                From searching for lost objects to trailing and locating rats, NASDA lets dogs use their noses, independence, and problem solving skills in exciting and rewarding ways.
            </p>

            <a
                href="#"
                class="learn-more-link text-sp-prairieOchre mt-4">
                Read the Guide
                <x-icons.move-right />
            </a>

        </div>

    </article>


    {{-- Book Review Card --}}
    <article class="col-span-12 md:col-span-4 grid grid-cols-1 md:grid-cols-2 gap-6 rounded-md border border-sp-warmStone p-4">

        {{-- Book Cover --}}
        <div>

            <img
                src="{{ asset('images/learn/book-reviews/one-on-one.jpg') }}"
                alt="Cover of One on One: A Dog Trainer’s Guide to Private Lessons by Nicole Wilde."
                class="w-full aspect-[3/4] object-cover rounded-md">

        </div>

        {{-- Review Content --}}
        <div class="flex flex-col">

            <p class="font-display font-bold text-lg text-sp-prairieOchre uppercase">
                Book Review
            </p>

            <h2 class="font-sans text-2xl font-semibold text-sp-charcoal mt-2">
                One on One
            </h2>

            <p class="body text-sp-slate mt-4">
                A practical guide to private dog training lessons, from working with clients to structuring sessions and building a successful training relationship.
            </p>

            <a
                href="#"
                class="learn-more-link text-sp-prairieOchre mt-4">
                Read the Review
                <x-icons.move-right />
            </a>

        </div>

    </article>

</section>
{{-- End Learn Articles --}}

{{-- Pagination --}}
<nav
    class="px-6 pb-12 md:px-8 md:pb-16"
    aria-label="Learn pagination">

    <ul class="flex flex-wrap items-center justify-center gap-2">

        {{-- Previous --}}
        <li>
            <span
                class="inline-flex items-center justify-center rounded-md border border-sp-warmStone px-3 py-2 text-xs uppercase text-sp-slate opacity-50 md:px-4 md:py-3 md:text-sm"
                aria-disabled="true">
                Previous
            </span>
        </li>

        {{-- Current Page --}}
        <li>
            <span
                class="inline-flex min-w-9 items-center justify-center rounded-md bg-sp-prairieGreen px-2 py-2 text-xs text-sp-warmIvory md:min-w-11 md:px-3 md:py-3 md:text-sm"
                aria-current="page">
                1
            </span>
        </li>

        {{-- Page 2 --}}
        <li>
            <a
                href="#"
                class="inline-flex min-w-9 items-center justify-center rounded-md border border-sp-warmStone px-2 py-2 text-xs text-sp-charcoal transition-colors hover:border-sp-prairieGreen hover:text-sp-prairieGreen md:min-w-11 md:px-3 md:py-3 md:text-sm">
                2
            </a>
        </li>

        {{-- Page 3 --}}
        <li>
            <a
                href="#"
                class="inline-flex min-w-9 items-center justify-center rounded-md border border-sp-warmStone px-2 py-2 text-xs text-sp-charcoal transition-colors hover:border-sp-prairieGreen hover:text-sp-prairieGreen md:min-w-11 md:px-3 md:py-3 md:text-sm">
                3
            </a>
        </li>

        {{-- Page 4 --}}
        <li>
            <a
                href="#"
                class="inline-flex min-w-9 items-center justify-center rounded-md border border-sp-warmStone px-2 py-2 text-xs text-sp-charcoal transition-colors hover:border-sp-prairieGreen hover:text-sp-prairieGreen md:min-w-11 md:px-3 md:py-3 md:text-sm">
                4
            </a>
        </li>

        {{-- Ellipsis --}}
        <li>
            <span
                class="inline-flex min-w-9 items-center justify-center px-2 py-2 text-xs text-sp-slate md:min-w-11 md:px-3 md:py-3 md:text-sm"
                aria-hidden="true">
                …
            </span>
        </li>

        {{-- Last Page --}}
        <li>
            <a
                href="#"
                class="inline-flex min-w-9 items-center justify-center rounded-md border border-sp-warmStone px-2 py-2 text-xs text-sp-charcoal transition-colors hover:border-sp-prairieGreen hover:text-sp-prairieGreen md:min-w-11 md:px-3 md:py-3 md:text-sm">
                10
            </a>
        </li>

        {{-- Next --}}
        <li>
            <a
                href="#"
                class="inline-flex items-center justify-center rounded-md border border-sp-prairieGreen px-3 py-2 text-xs uppercase text-sp-prairieGreen transition-colors hover:border-sp-prairieOchre hover:text-sp-prairieOchre md:px-4 md:py-3 md:text-sm">
                Next
            </a>
        </li>

    </ul>

</nav>
{{-- End Pagination --}}

{{-- Browse by Topic --}}
<section class="px-6 pt-8 pb-14 md:px-8 md:pt-10 md:pb-16">

    <h2 class="body-small text-sp-charcoal uppercase">
        Browse by Topic
    </h2>

    <ul class="flex flex-wrap gap-3 md:gap-4 mt-4">

        <li>
            <a
                href="#"
                class="inline-flex items-center rounded-full bg-sp-limestone px-4 py-2 text-xs text-sp-prairieGreen transition-colors hover:bg-sp-warmStone">
                NASDA
            </a>
        </li>

        <li>
            <a
                href="#"
                class="inline-flex items-center rounded-full bg-sp-limestone px-4 py-2 text-xs text-sp-prairieGreen transition-colors hover:bg-sp-warmStone">
                Reactive Dogs
            </a>
        </li>

        <li>
            <a
                href="#"
                class="inline-flex items-center rounded-full bg-sp-limestone px-4 py-2 text-xs text-sp-prairieGreen transition-colors hover:bg-sp-warmStone">
                Trick Dog
            </a>
        </li>

        <li>
            <a
                href="#"
                class="inline-flex items-center rounded-full bg-sp-limestone px-4 py-2 text-xs text-sp-prairieGreen transition-colors hover:bg-sp-warmStone">
                Private Training
            </a>
        </li>

        <li>
            <a
                href="#"
                class="inline-flex items-center rounded-full bg-sp-limestone px-4 py-2 text-xs text-sp-prairieGreen transition-colors hover:bg-sp-warmStone">
                First Trials
            </a>
        </li>

        <li>
            <a
                href="#"
                class="inline-flex items-center rounded-full bg-sp-limestone px-4 py-2 text-xs text-sp-prairieGreen transition-colors hover:bg-sp-warmStone">
                Resource Roundup
            </a>
        </li>

    </ul>

</section>
{{-- End Browse by Topic --}}


@endsection