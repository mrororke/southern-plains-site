@extends('public-v2.layouts.app')


@section('hero')

{{-- Learn Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 gap-6 px-6 pt-8 pb-12 md:px-8 md:pt-12 md:pb-16">

    {{-- Intro --}}
    <div class="col-span-12 md:col-span-10">

        <p class="font-display font-bold text-2xl text-sp-burntClay">
            Book Review
        </p>

        <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">
            One on One
        </h2>

        <p class="body-large text-sp-slate mt-4">
            A Dog Trainer's Guide to Private Lessons<br/>
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

        <p class="body text-sp-slate mt-4">
            The games are based on historic working and competitive field activities and are designed to resemble real-life situations for dogs and their handlers. Purebred or mixed breed, young or old, experienced sport dog or complete beginner—NASDA gives dogs of all kinds an opportunity to search, problem-solve, and do what comes naturally.
        </p>

        <p class="body text-sp-slate mt-4">
            It’s also an incredibly beginner-friendly dog sport. You don’t need a long list of obedience titles, specialized equipment, or years of training before you can give it a try. Your dog doesn’t have to be perfect to come play.
        </p>

    </div>


    {{-- Book --}}
    <div class="col-span-12 md:col-span-5">
        Book cover here.
    </div>

</div>

@endsection