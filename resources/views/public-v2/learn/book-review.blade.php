@extends('public-v2.layouts.app')


@section('hero')

{{-- Book Review Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 gap-6 px-6 pt-8 pb-12 md:px-8 md:pt-12 md:pb-16">

    {{-- Intro --}}
    <div class="col-span-12 md:col-span-7">

        <p class="font-display font-bold text-2xl text-sp-burntClay">
            Book Review
        </p>

        <h1 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">
            One on One
        </h1>

        <p class="body-large text-sp-slate mt-4">
            A Dog Trainer's Guide to Private Lessons<br>
            Written by Nicole Wilde.
        </p>

        {{-- Article Metadata --}}
        <x-public-v2.article-metadata
            category="Book Review"
            read-time="8 min read"
            updated="Last updated August 12th, 2026" />
        {{-- End Article Metadata --}}

        {{-- Affiliate Callout --}}
        <x-public-v2.callout
            icon="ad"
            title="Affiliate Link Disclaimer">
            Some of the links in this post are affiliate links, which means I may earn a small commission at no additional cost to you if you make a purchase through these links. I only recommend products and services I genuinely use and believe will add value to you. Thank you for supporting Southern Plains!
        </x-public-v2.callout>
        {{-- End Affiliate Callout --}}

    </div>

    {{-- Book Cover --}}
    <div class="col-span-12 md:col-span-5 flex items-start justify-center md:justify-end">

        <img
            src="{{ asset('/images/reviews/wilde-nicole-one-on-one.jpg') }}"
            alt="Cover of One on One: A Dog Trainer's Guide to Private Lessons by Nicole Wilde."
            class="block w-full max-w-sm rounded-md object-cover">

    </div>

</div>
{{-- End Book Review Hero --}}

@endsection