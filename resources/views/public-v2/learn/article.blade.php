@extends('public-v2.layouts.app')

@php
$category = $article->categories->first()?->name ?? 'Learn';

$heroImage = $article->images->first();
$supportingImages = $article->images->skip(1);

$heroImageUrl = $heroImage
? \Illuminate\Support\Facades\Storage::disk('public')->url($heroImage->image_path)
: null;

$updatedDate = $article->updated_at
? 'Last updated ' . $article->updated_at->format('F j, Y')
: null;

$publishedDate = $article->published_at
? $article->published_at->format('F j, Y')
: null;

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

'image_alt' => $related->images->first()?->alt_text
?? $related->title,

'href' => route('public-v2.learn.show', $related->slug),

'link_label' => match ($related->type) {
'guide' => 'Read the Guide',
'book_review' => 'Read the Review',
default => 'Read the Article',
},
];
})->all();

$articleTags = $article->tags
->map(fn ($tag) => [
'name' => $tag->name,
'slug' => $tag->slug,
])
->all();
@endphp


@section('hero')

{{-- Learn Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 gap-6 px-6 pt-8 pb-12 md:px-8 md:pt-12 md:pb-16">

    {{-- Intro --}}
    <div class="col-span-12 md:col-span-10">

        <p class="font-display font-bold text-2xl text-sp-burntClay">
            {{ $category }}
        </p>

        <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">
            {{ $article->title }}
        </h2>

        {{-- Article Metadata --}}
        <x-public-v2.article-metadata
            :category="$category"
            :read-time="$article->reading_time"
            :updated="$updatedDate"
            :published="$publishedDate" />
        {{-- End Article Metadata --}}

        

    </div>

</div>
{{-- End Learn Hero --}}

@endsection


@section('content')

{{-- Article Content --}}
<section class="grid grid-cols-12 gap-6 px-6 pb-16 md:px-8 md:pb-24">

    <div class="col-span-12 md:col-span-10 md:col-start-1">

        {{-- Article Hero Image --}}
        @if ($heroImageUrl)

        <div class="mb-12 md:mb-16 relative">

            <img
                src="{{ $heroImageUrl }}"
                alt="{{ $heroImage->alt_text ?? $article->title }}"
                class="w-full aspect-[8/3] object-cover rounded-md">

            @if($heroImage->caption)

            <x-public-v2.image-registration
                :text="$heroImage->caption"
                :href="$heroImage->photographer_url"
                position="right" />

            @endif

        </div>

        @endif
        {{-- End Article Hero Image --}}


        {{-- Article Body --}}
        <div class="grid grid-cols-10 items-stretch gap-6">

            {{-- Main Article Content --}}
            <article class="col-span-10 md:col-span-7">
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

                <div class="body text-sp-slate">
                    {!! $article->body !!}
                </div>

                {{-- Tags --}}
                @if ($articleTags)

                <div class="mt-10">

                    <x-public-v2.learn-tags :tags="$articleTags" />

                </div>

                @endif
                {{-- End Tags --}}

            </article>
            {{-- End Main Article Content --}}


            {{-- Supporting Figures --}}
            @if ($supportingImages->isNotEmpty())

            <aside class="col-span-10 self-start md:col-span-3">

                @php
                $figureNumber = 0;
                @endphp

                @foreach ($supportingImages as $image)

                @if ($image->display_type === 'figure')

                @php
                $figureNumber++;
                @endphp

                <x-public-v2.learn-figure
                    :image="'storage/' . $image->image_path"
                    :alt="$image->alt_text ?? ''"
                    :number="str_pad($figureNumber, 2, '0', STR_PAD_LEFT)"
                    :title="$image->figure_title ?? ''"
                    :description="$image->figure_description"
                    :credit="$image->photographer_name"
                    :credit-url="$image->photographer_url" />

                @else

                <figure class="{{ $loop->first ? '' : 'mt-10' }}">

                    <img
                        src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($image->image_path) }}"
                        alt="{{ $image->alt_text ?? '' }}"
                        class="block w-full rounded-md">

                    @if ($image->caption)

                    <figcaption class="text-xs text-sp-slate mt-3">
                        {{ $image->caption }}
                    </figcaption>

                    @endif

                </figure>

                @endif

                @endforeach

            </aside>

            @endif
            {{-- End Supporting Figures --}}

        </div>
        {{-- End Article Body --}}


        {{-- Learn More --}}
        @if (count($relatedItems) > 0)

        <x-public-v2.learn-more
            :items="$relatedItems"
            :library-url="route('public-v2.learn.index')" />

        @endif
        {{-- End Learn More --}}

    </div>

</section>
{{-- End Article Content --}}

@endsection