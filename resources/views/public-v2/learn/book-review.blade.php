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
            A Dog Trainer's Guide to Private Lessons<br />
            Written by Nicole Wilde.
        </p>

        {{-- Book Rating --}}
        <div class="mt-5">
            <x-public-v2.book-rating stars="4" />
        </div>
        {{-- End Book Rating --}}

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
            My overall impression of this 
            <a
                href="https://www.dogwise.com/ebook-one-on-one-a-dog-trainers-guide-to-private-lessons-2nd-edition/?aff=698"
                target="_blank"
                rel="noopener noreferrer"
                class="text-link">
                book
            </a>
            is simply wonderful for anyone considering the leap into a private dog training business. Nicole Wilde's language is refreshingly easy to understand, and her practical suggestions, paired with relatable, real-world scenarios, make it an exceptionally clear and enjoyable read.
        </p>

        <p class="body text-sp-slate mt-4">
            My absolute favorite and, in my opinion, the most valuable section is Part V: Solving the Mystery: Taking a History. This part alone offers a treasure trove of insightful questions for client intake—questions that, while making perfect sense once you see them, aren't necessarily obvious when you're just starting out. It's a game-changer for really understanding a dog's background.
        </p>

        <p class="body text-sp-slate mt-4">
            The 
            <a
                href="https://www.dogwise.com/ebook-one-on-one-a-dog-trainers-guide-to-private-lessons-2nd-edition/?aff=698"
                target="_blank"
                rel="noopener noreferrer"
                class="text-link">
                book
            </a>
             also shines with its suggestions for achieving client compliance. We all know having a solid training plan is one thing, but getting the human half of the partnership to consistently follow through is often the bigger challenge. Wilde provides excellent strategies to bridge that gap.
        </p>

        <p class="body text-sp-slate mt-4">
            I found Appendix A to be an invaluable resource. It's packed with templates and guidance crucial for not just starting a new business, but also for building immediate credibility. Having professional-looking documents and handouts can truly help new trainers "look the part," which can be a huge confidence booster and help silence that nagging imposter syndrome.
        </p>

        <p class="body text-sp-slate mt-4">
            Finally, the resource list (in my 2nd edition) is fantastic, filled with highly relevant and useful links for further learning.
        </p>

        <p class="body text-sp-slate mt-4">
            This book is definitely a great addition to my personal library. I'm so glad I have my physical copy, thoroughly annotated, to refer back to again and again. It's a practical guide I'll be recommending to aspiring and new private trainers alike.
        </p>

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
@section('content')

{{-- Book Review Supporting Content --}}
<div class="px-6 md:px-8 md:py-8">

    {{-- Tags --}}
    <x-public-v2.learn-tags
        :tags="[
            'Private Training',
            'Dog Training',
            'Book Reviews',
            'Positive Reinforcement',
        ]" />
    {{-- End Tags --}}

    {{-- Learn More --}}
    <x-public-v2.learn-more
        :items="[
            [
                'image' => asset('images/learn/what-is-nasda/featured.jpg'),
                'image_alt' => 'Hamish searching for a NASDA quarry.',
                'category' => 'Dog Sports 101',
                'title' => 'What Is NASDA, Anyway?',
                'description' => 'A beginner-friendly introduction to NASDA and its Level One sports.',
                'href' => url('/v2/learn/what-is-nasda'),
                'link_label' => 'Read the Guide',
            ],
            [
                'image' => asset('images/learn/what-is-nasda/featured.jpg'),
                'image_alt' => 'Luka lying in the grass.',
                'category' => 'Handler Insights',
                'title' => 'The Legacy of Luka',
                'description' => 'A personal reflection on Luka, reactivity, dog training, and the unexpected ways one dog can change your life.',
                'href' => url('/v2/learn/the-legacy-of-luka'),
                'link_label' => 'Read the Article',
            ],
            [
                'image' => asset('images/learn/what-is-nasda/featured.jpg'),
                'image_alt' => 'Placeholder Learn resource image.',
                'category' => 'Placeholder',
                'title' => 'Another Learn Resource',
                'description' => 'Placeholder description for another resource in the Learn section.',
                'href' => '#',
                'link_label' => 'Read More',
            ],
            [
                'image' => asset('images/learn/what-is-nasda/featured.jpg'),
                'image_alt' => 'Placeholder Learn resource image.',
                'category' => 'Placeholder',
                'title' => 'Another Learn Resource',
                'description' => 'Placeholder description for another resource in the Learn section.',
                'href' => '#',
                'link_label' => 'Read More',
            ],
        ]"
        library-url="{{ url('/v2/learn') }}" />

    {{-- End Learn More --}}

</div>
{{-- End Book Review Supporting Content --}}

@endsection