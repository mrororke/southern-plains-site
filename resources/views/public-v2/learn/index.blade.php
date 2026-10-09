@extends('public-v2.layouts.app')

{{-- Learn Hero --}}
@section('hero')

    @php
        $filters = [
            [
                'label' => 'All',
                'href' => route('public-v2.learn.index'),
                'active' => ! $selectedCategory && ! $selectedTag,
            ],
        ];

        foreach (\App\Models\LearnCategory::query()->orderBy('name')->get() as $category) {
            $parameters = [
                'category' => $category->slug,
            ];

            if ($selectedTag) {
                $parameters['tag'] = $selectedTag->slug;
            }

            $filters[] = [
                'label' => $category->name,
                'href' => route(
                    'public-v2.learn.index',
                    $parameters
                ),
                'active' => $selectedCategory?->id === $category->id,
            ];
        }
    @endphp

    <x-public-v2.learn-hero :filters="$filters" />

@endsection
{{-- End Learn Hero --}}


@section('content')

    {{-- Featured Article --}}
    @if ($featuredArticle)

        @php
            $featuredImage = $featuredArticle->images->first();

            $featuredImageUrl = $featuredImage
                ? \Illuminate\Support\Facades\Storage::disk('public')->url($featuredImage->image_path)
                : asset('images/og/home.jpg');

            $featuredCategory = $featuredArticle->categories->first()?->name
                ?? 'Learn';
        @endphp

        <x-public-v2.learn-featured
            :image="$featuredImageUrl"
            :image-alt="$featuredImage?->alt_text ?? $featuredArticle->title"
            :category="$featuredCategory"
            :title="$featuredArticle->title"
            :description="$featuredArticle->excerpt ?? ''"
            :href="route('public-v2.learn.show', $featuredArticle->slug)"
            :link-label="$featuredArticle->type === 'guide' ? 'Read the Guide' : 'Read the Article'"
        />

    @endif
    {{-- End Featured Article --}}


    {{-- Learn Articles --}}
    <section class="grid grid-cols-12 items-start gap-6 px-6 pb-12 md:px-8 md:pb-16">

        @forelse ($articles as $article)

            @if ($article->type === 'book_review')

                @php
                    $bookCover = $article->bookReview?->cover_image_path;

                    $bookImageUrl = $bookCover
                        ? \Illuminate\Support\Facades\Storage::disk('public')->url($bookCover)
                        : asset('images/og/home.jpg');
                @endphp

                <x-public-v2.learn-book-card
                    :image="$bookImageUrl"
                    :image-alt="'Cover of ' . ($article->bookReview?->book_title ?? $article->title)"
                    category="Book Review"
                    :title="$article->title"
                    :description="$article->excerpt ?? ''"
                    :href="route('public-v2.learn.show', $article->slug)"
                    link-label="Read the Review"
                />

            @else

                @php
                    $articleImage = $article->images->first();

                    $articleImageUrl = $articleImage
                        ? \Illuminate\Support\Facades\Storage::disk('public')->url($articleImage->image_path)
                        : asset('images/og/home.jpg');

                    $articleCategory = $article->categories->first()?->name
                        ?? 'Learn';
                @endphp

                <x-public-v2.learn-standard-card
                    :image="$articleImageUrl"
                    :image-alt="$articleImage?->alt_text ?? $article->title"
                    :category="$articleCategory"
                    :title="$article->title"
                    :description="$article->excerpt ?? ''"
                    :href="route('public-v2.learn.show', $article->slug)"
                    :link-label="$article->type === 'guide' ? 'Read the Guide' : 'Read the Article'"
                />

            @endif

        @empty

            <div class="col-span-12 py-16 text-center">

                <h2 class="font-sans text-2xl font-semibold text-sp-charcoal">
                    More to explore soon
                </h2>

                <p class="body text-sp-slate mt-4">
                    New articles and resources are on their way.
                </p>

                @if ($selectedCategory || $selectedTag)

                    <a
                        href="{{ route('public-v2.learn.index') }}"
                        class="learn-more-link text-sp-prairieOchre mt-6">

                        Browse All Articles

                        <x-icons.move-right />

                    </a>

                @endif

            </div>

        @endforelse

    </section>
    {{-- End Learn Articles --}}


    {{-- Pagination --}}
    <x-public-v2.learn-pagination :paginator="$articles" />
    {{-- End Pagination --}}


    {{-- Browse by Topic --}}
    @if (count($topics) > 0)

        <x-public-v2.learn-topics :topics="$topics" />

    @endif
    {{-- End Browse by Topic --}}

@endsection