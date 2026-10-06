@extends('public-v2.layouts.app')

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
<x-public-v2.learn-featured
    image="{{ asset('images/learn/what-is-nasda/featured.jpg') }}"
    image-alt="Hamish, a black and white Sheltie, investigating a NASDA quarry box."
    category="Dog Sports 101"
    title="What Is NASDA, Anyway?"
    description="From searching for lost objects to trailing and locating rats, NASDA lets dogs use their noses, independence, and problem solving skills in exciting and rewarding ways."
    :href="route('public-v2.learn.guide')"
    link-label="Read the Guide" />
{{-- End Featured Article --}}

{{-- Learn Articles --}}
<section class="grid grid-cols-12 items-start gap-6 px-6 pb-12 md:px-8 md:pb-16">

    {{-- Standard Article Card --}}
    <x-public-v2.learn-standard-card
        image="{{ asset('images/learn/what-is-nasda/featured.jpg') }}"
        image-alt="Hamish, a black and white Sheltie, investigating a NASDA quarry box."
        category="Dog Sports 101"
        title="What Is NASDA, Anyway?"
        description="From searching for lost objects to trailing and locating rats, NASDA lets dogs use their noses, independence, and problem solving skills in exciting and rewarding ways."
        :href="route('public-v2.learn.guide')"
        link-label="Read the Guide" />

    {{-- Book Review Card --}}
    <x-public-v2.learn-book-card
        image="{{ asset('images/learn/book-reviews/one-on-one.jpg') }}"
        image-alt="Cover of One on One: A Dog Trainer’s Guide to Private Lessons by Nicole Wilde."
        category="Book Review"
        title="One on One"
        description="A practical guide to private dog training lessons, from working with clients to structuring sessions and building a successful training relationship."
        href="#"
        link-label="Read the Review" />

</section>
{{-- End Learn Articles --}}


{{-- Pagination --}}
<x-public-v2.learn-pagination
    current-page="1"
    last-page="10" />
{{-- End Pagination --}}

{{-- Browse by Topic --}}
<x-public-v2.learn-topics
    :topics="[
        [
            'label' => 'NASDA',
            'href' => '#',
        ],
        [
            'label' => 'Reactive Dogs',
            'href' => '#',
        ],
        [
            'label' => 'Trick Dog',
            'href' => '#',
        ],
        [
            'label' => 'Private Training',
            'href' => '#',
        ],
        [
            'label' => 'First Trials',
            'href' => '#',
        ],
        [
            'label' => 'Resource Roundup',
            'href' => '#',
        ],
    ]" />
{{-- End Browse by Topic --}}


@endsection