@extends('public-v2.layouts.app')

@php
    $bookReview = $article->bookReview;

    $bookTitle = $bookReview?->book_title ?? $article->title;
    $bookAuthor = $bookReview?->book_author;
    $rating = (int) ($bookReview?->rating ?? 0);

    $coverImageUrl = $bookReview?->cover_image_path
        ? \Illuminate\Support\Facades\Storage::disk('public')->url(
            $bookReview->cover_image_path
        )
        : null;

    $updatedDate = $article->updated_at
        ? 'Last updated ' . $article->updated_at->format('F j, Y')
        : null;

    $publishedDate = $article->published_at
        ? $article->published_at->format('F j, Y')
        : null;

    $articleTags = $article->tags
        ->map(fn ($tag) => [
            'name' => $tag->name,
            'slug' => $tag->slug,
        ])
        ->all();

    $relatedItems = $relatedArticles->map(function ($related) {
        $image = $related->type === 'book_review'
            ? $related->bookReview?->cover_image_path
            : $related->images->first()?->image_path;

        return [
            'category' => $related->type === 'book_review'
                ? 'Book Review'
                : ($related->categories->first()?->name ?? 'Learn'),

            'title' => $related->title,

            'description' => $related->excerpt ?? '',

            'image' => $image
                ? \Illuminate\Support\Facades\Storage::disk('public')->url($image)
                : asset('images/og/home.jpg'),

            'image_alt' => $related->type === 'book_review'
                ? 'Cover of ' . ($related->bookReview?->book_title ?? $related->title)
                : ($related->images->first()?->alt_text ?? $related->title),

            'href' => route('public-v2.learn.show', $related->slug),

            'link_label' => match ($related->type) {
                'guide' => 'Read the Guide',
                'book_review' => 'Read the Review',
                default => 'Read the Article',
            },
        ];
    })->all();
@endphp


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
                {{ $bookTitle }}
            </h1>

            @if ($bookAuthor)
                <p class="body-large text-sp-slate mt-4">
                    Written by {{ $bookAuthor }}.
                </p>
            @endif

            {{-- Book Rating --}}
            @if ($rating >= 1 && $rating <= 5)
                <div class="mt-5">
                    <x-public-v2.book-rating :stars="$rating" />
                </div>
            @endif
            {{-- End Book Rating --}}

            {{-- Article Metadata --}}
            <x-public-v2.article-metadata
                category="Book Review"
                :read-time="$article->reading_time"
                :updated="$updatedDate"
                :published="$publishedDate" />
            {{-- End Article Metadata --}}

            {{-- Affiliate Callout --}}
            @if ($article->has_affiliate_links)
                <x-public-v2.callout
                    icon="ad"
                    title="Affiliate Link Disclaimer">
                    Some of the links in this post are affiliate links, which means
                    I may earn a small commission at no additional cost to you if
                    you make a purchase through these links. I only recommend
                    products and services I genuinely use and believe will add
                    value to you. Thank you for supporting Southern Plains!
                </x-public-v2.callout>
            @endif
            {{-- End Affiliate Callout --}}

            {{-- Review Content --}}
            @if ($article->body)
                <div class="learn-article-body body text-sp-slate mt-8">
                    {!! $article->body !!}
                </div>
            @endif
            {{-- End Review Content --}}

        </div>
        {{-- End Intro --}}

        {{-- Book Cover --}}
        <div class="col-span-12 md:col-span-5 flex items-start justify-center md:justify-end">

            @if ($coverImageUrl)
                <img
                    src="{{ $coverImageUrl }}"
                    alt="Cover of {{ $bookTitle }}{{ $bookAuthor ? ' by ' . $bookAuthor : '' }}"
                    class="block w-full max-w-sm rounded-md object-cover">
            @endif

        </div>
        {{-- End Book Cover --}}

    </div>
    {{-- End Book Review Hero --}}

@endsection


@section('content')

    {{-- Book Review Supporting Content --}}
    <div class="px-6 md:px-8 md:py-8">

        {{-- Tags --}}
        @if (count($articleTags) > 0)
            <x-public-v2.learn-tags :tags="$articleTags" />
        @endif
        {{-- End Tags --}}

        {{-- Learn More --}}
        @if (count($relatedItems) > 0)
            <x-public-v2.learn-more
                :items="$relatedItems"
                :library-url="route('public-v2.learn.index')" />
        @endif
        {{-- End Learn More --}}

    </div>
    {{-- End Book Review Supporting Content --}}

@endsection