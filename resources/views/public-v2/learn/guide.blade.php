@extends('public-v2.layouts.app')

@php
    /*
    |--------------------------------------------------------------------------
    | Article Information
    |--------------------------------------------------------------------------
    */

    $category = $article->categories->first()?->name ?? 'Learn';

    $reviewDate = $article->last_reviewed_at
        ? 'Last reviewed ' . $article->last_reviewed_at->format('F j, Y')
        : 'Last updated ' . $article->updated_at->format('F j, Y');

    /*
    |--------------------------------------------------------------------------
    | Images
    |--------------------------------------------------------------------------
    */

    $heroImage = $article->images->first();

    $supportingImages = $article->images->skip(1);

    $heroImageUrl = $heroImage
        ? \Illuminate\Support\Facades\Storage::disk('public')->url($heroImage->image_path)
        : null;

    /*
    |--------------------------------------------------------------------------
    | Generate Guide Navigation From H2 Headings
    |--------------------------------------------------------------------------
    |
    | Preserve existing heading IDs where possible.
    | Generate IDs for headings that do not already have one.
    | Keep the article HTML and navigation synchronized.
    |
    */

    $guideNavigation = [];

    $guideBody = $article->body ?? '';

    if (trim($guideBody) !== '') {

        $document = new \DOMDocument('1.0', 'UTF-8');

        $previousErrors = libxml_use_internal_errors(true);

        $document->loadHTML(
            '<?xml encoding="UTF-8"><div id="learn-guide-content">' .
            $guideBody .
            '</div>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );

        libxml_clear_errors();
        libxml_use_internal_errors($previousErrors);

        $xpath = new \DOMXPath($document);

        $headings = $xpath->query(
            '//*[@id="learn-guide-content"]//h2'
        );

        $usedIds = [];

        // Reserve IDs already used anywhere in the article.
        foreach ($xpath->query('//*[@id]') as $element) {
            if ($element->getAttribute('id') !== 'learn-guide-content') {
                $usedIds[] = $element->getAttribute('id');
            }
        }

        foreach ($headings as $heading) {

            $label = trim(
    $heading->getAttribute('data-nav-label')
        ?: $heading->textContent
);

            if ($label === '') {
                continue;
            }

            $existingId = trim($heading->getAttribute('id'));

            if ($existingId !== '') {

                $id = $existingId;

            } else {

                $baseId = \Illuminate\Support\Str::slug($label);

                if ($baseId === '') {
                    $baseId = 'guide-section';
                }

                $id = $baseId;
                $suffix = 2;

                while (in_array($id, $usedIds, true)) {
                    $id = $baseId . '-' . $suffix;
                    $suffix++;
                }

                $heading->setAttribute('id', $id);

                $usedIds[] = $id;
            }

            $guideNavigation[] = [
                'id' => $id,
                'label' => $label,
            ];
        }

        $container = $document->getElementById('learn-guide-content');

        if ($container) {

            $guideBody = '';

            foreach ($container->childNodes as $child) {
                $guideBody .= $document->saveHTML($child);
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Tags
    |--------------------------------------------------------------------------
    */

    $articleTags = $article->tags
        ->map(fn ($tag) => [
            'name' => $tag->name,
            'slug' => $tag->slug,
        ])
        ->all();

    /*
    |--------------------------------------------------------------------------
    | Related Articles
    |--------------------------------------------------------------------------
    */

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
                ? $related->title
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

    {{-- Learn Hero --}}

    <div
        id="hero"
        class="grid grid-cols-12 gap-6 px-6 pt-8 pb-12 md:px-8 md:pt-12 md:pb-16">

        <div class="col-span-12 md:col-span-7">

            {{-- Category --}}

            <p class="font-display font-bold text-2xl text-sp-burntClay">
                {{ $category }}
            </p>

            {{-- Title --}}

            <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">
                {{ $article->title }}
            </h2>

            {{-- Article Metadata --}}

            <x-public-v2.article-metadata
                :category="$category"
                :read-time="$article->reading_time"
                :updated="$reviewDate" />

            {{-- Introduction --}}

            @if(filled($article->introduction))

                <div class="learn-article-body mt-4 text-sp-slate">
                    {!! $article->introduction !!}
                </div>

            @endif

        </div>

    </div>

@endsection


@section('content')

    {{-- Guide Content --}}

    <section class="grid grid-cols-12 gap-6 px-6 pb-16 md:px-8 md:pb-24">

        <div class="col-span-12 md:col-span-10 md:col-start-1">

            {{-- Guide Hero Image --}}

            @if($heroImageUrl)

                <div class="mb-12 md:mb-16 relative">

                    <img
                        src="{{ $heroImageUrl }}"
                        alt="{{ $heroImage->alt_text ?? $article->title }}"
                        class="w-full aspect-[8/3] object-cover rounded-md">

                    @if($heroImage->caption)

                        <x-public-v2.image-registration
                            :text="$heroImage->caption"
                            position="right" />

                    @endif

                </div>

            @endif

            {{-- End Guide Hero Image --}}


            {{-- Guide Body --}}

            <div class="grid grid-cols-10 items-stretch gap-6">

                {{-- Main Guide Content --}}

                <article class="col-span-10 md:col-span-7">

                    <div class="learn-article-body">

                        {!! $guideBody !!}

                    </div>

                    {{-- Tags --}}

                    @if(count($articleTags) > 0)

                        <div class="mt-10">

                            <x-public-v2.learn-tags
                                :tags="$articleTags" />

                        </div>

                    @endif

                    {{-- End Tags --}}

                </article>


                {{-- Supporting Figures --}}
@if($supportingImages->isNotEmpty())
    <aside class="col-span-10 self-start md:col-span-3">
        @php
            $figureNumber = 0;
        @endphp

        @foreach($supportingImages as $image)
            <div class="{{ $loop->first ? '' : 'mt-10' }}">
                @if($image->display_type === 'figure')
                    @php
                        $figureNumber++;
                    @endphp

                    <x-public-v2.learn-figure
                        :image="'storage/' . $image->image_path"
                        :alt="$image->alt_text ?? ''"
                        :number="str_pad($figureNumber, 2, '0', STR_PAD_LEFT)"
                        :title="$image->caption ?? ''"
                    />
                @else
                    <figure>
                        <img
                            src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($image->image_path) }}"
                            alt="{{ $image->alt_text ?? '' }}"
                            class="block w-full rounded-md">

                        @if($image->caption)
                            <figcaption class="mt-3 text-xs text-sp-slate">
                                {{ $image->caption }}
                            </figcaption>
                        @endif
                    </figure>
                @endif
            </div>
        @endforeach
    </aside>
@endif
{{-- End Supporting Figures --}}

            </div>

            {{-- End Guide Body --}}


            {{-- Related Articles --}}

            @if(count($relatedItems) > 0)

                <x-public-v2.learn-more
                    :items="$relatedItems"
                    :library-url="route('public-v2.learn.index')" />

            @endif

            {{-- End Related Articles --}}

        </div>


        {{-- Guide Navigation --}}

        @if(count($guideNavigation) > 0)

            <x-public-v2.learn-guide-navigation
                :items="$guideNavigation" />

        @endif

        {{-- End Guide Navigation --}}

    </section>

    {{-- End Guide Content --}}


    {{-- Guide Navigation Active Section Tracking --}}

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const navLinks = document.querySelectorAll('[data-guide-nav]');

            if (!navLinks.length) {
                return;
            }

            const guideSections = Array.from(navLinks)
                .map(link => {
                    const id = link.getAttribute('href')?.substring(1);

                    return id
                        ? document.getElementById(id)
                        : null;
                })
                .filter(Boolean);

            if (!guideSections.length) {
                return;
            }

            const setActiveSection = (id) => {

                navLinks.forEach(link => {

                    const isActive =
                        link.getAttribute('href') === `#${id}`;

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
                                a.boundingClientRect.top -
                                b.boundingClientRect.top
                        );

                    if (visibleSections.length) {
                        setActiveSection(
                            visibleSections[0].target.id
                        );
                    }

                },

                {
                    rootMargin: '-20% 0px -65% 0px',
                    threshold: 0
                }

            );

            guideSections.forEach(section => {
                observer.observe(section);
            });

            setActiveSection(guideSections[0].id);

        });
    </script>

@endsection