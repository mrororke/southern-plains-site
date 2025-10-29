@extends('layouts.blog-base')

{{--
| ----------------------------------------------------
| SEO SLOTS
| ----------------------------------------------------
--}}
@section('metaTitle', 'Blog | Latest Training Tips and Stories')
@section('metaDescription', 'Read the latest articles from Southern Plains Sport Dog Club.')


{{--
| ----------------------------------------------------
| 1. Clear Sidebar/Slider (Ensures the main content is full width)
| ----------------------------------------------------
--}}
@section('slider_column')
{{-- Intentionally left empty to ensure the main content is full-width. --}}
@endsection


{{--
| ----------------------------------------------------
| 2. Blog Introduction & Filter (Top section, full width, centered)
| ----------------------------------------------------
--}}
@section('page_content')
<div class="mx-auto pt-10">
    <div class="flex flex-col lg:flex-row gap-10">
        <div class="w-full lg:w-3/4">
            <h4 class="uppercase text-xs font-bold">Southern Plains Blog</h4>
            <h1 class="font-heading text-7xl">A trainer's insight.<br />A judge's perspective.</h1>

            <p class="text-base mb-2">This is where the training ground meets the trial field. Dive into our latest articles where we break down positive reinforcement techniques, share NASDA judging insights, and review the best gear and books for dog sports. Whether you're working on foundational manners or competing for a championship title, find the informed perspective you need to sharpen your partnership and achieve your goals.</p>
        </div>
        <aside class="w-full lg:w-1/4 pt-4 lg:pt-0">
            {{-- STATIC FILTER/SEARCH AREA --}}
            <div class="mb-10 p-4">
                <div class="flex flex-col md:flex-column gap-4">
                    <x-blog.search-filter />
                </div>
            </div>
        </aside>
    </div>


</div>
@endsection

{{--
| ----------------------------------------------------
| 3. Main Blog Roll (Full Width, Two-Column Content Structure)
| ----------------------------------------------------
--}}
@section('feature_blocks')
<div class="container mx-auto px-6 py-6">

    {{-- Flex container for the 3/4 and 1/4 split --}}
    <div class="flex flex-col lg:flex-row gap-10">

        {{-- MAIN ARTICLES (Left Side: 3/4 Width) --}}
        <div class="w-full lg:w-3/4">
            <div class="flex flex-col lg:flex-row gap-4">
                <div class="w-full lg:w-3/4">
                    {{-- Loop through the first three posts fetched --}}
                    @foreach ($latestPosts->take(3) as $post)
                    <article class="border-b pb-8">
                        {{-- Post Image (Linked) --}}
                        <a href="{{ route('blog.show', $post->slug) }}">
                            <img src="{{ asset($post->hero_image_path) }}"
                                alt="{{ $post->title }}"
                                class="w-full h-96 object-cover shadow-md mb-6 rounded-lg">
                        </a>

                        {{-- Category --}}
                        <p class="text-sm font-semibold uppercase text-[#4CBB17] ">
                            {{ $post->category->name }}
                        </p>

                        {{-- Title (Linked) --}}
                        <h3 class="text-4xl font-heading font-extrabold text-black mb-3">
                            <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                        </h3>

                        {{-- Excerpt/Body --}}
                        <p class="text-base text-gray-900 mb-4">
                            {{!! Str::limit($post->body, 250) !!}}
                        </p>

                        {{-- Read More Link --}}
                        <a href="{{ route('blog.show', $post->slug) }}" class="text-[#4CBB17] font-medium hover:text-pink-800">Read More &rarr;</a>
                    </article>
                    @endforeach

                    {{-- Placeholder for Pagination or "Load More" button --}}
                    <div class="py-6 text-center">
                        {{-- {{ $latestPosts->links() }} --}}
                    </div>
                </div>
                <div class="w-full lg:w-1/4">
                    <article class="border-b pb-8">
                        <img src="{{ asset('images/blog-small-preview.jpg') }}"
                            alt="Placeholder image of a dog training"
                            class="w-full h-48 object-cover shadow-md mb-6">
                        <p class="text-xs font-semibold uppercase text-[#4CBB17]">Training</p>
                        <h3 class="uppercase text-base font-bold">
                            Title of the Latest Post Goes Here
                        </h3>
                        <p class="text-small text-gray-900 mb-4">
                            This is the excerpt for the main article. In the functional version, this content would be pulled directly from the database and truncated.
                        </p>
                        <a href="#" class="text-[#4CBB17] font-medium hover:text-pink-800">Read More &rarr;</a>
                    </article>
                </div>

            </div>


        </div>

        {{-- Categories & Tags (Right Side: 1/4 Width) --}}
        <aside class="w-full lg:w-1/4 pt-4 lg:pt-0">
            <h4 class="uppercase text-small font-bold pb-4">Categories</h4>

            <ul class="space-y-4">
                @forelse ($categories as $category)
                <li class="flex justify-between items-center pb-2 border-b last:border-b-0">
                    {{-- Category Name (Linked to the filter route) --}}
                    <a href="{{ route('blog.category', $category->slug) }}"
                        class="text-sm font-medium text-black hover:text-club-hover block leading-snug">
                        {{ $category->name }}
                    </a>

                    {{-- Number of Posts --}}
                    <span class="text-xs font-bold text-black bg-gray-200 px-2 py-0.5 rounded-full">
                        {{ $category->posts_count }}
                    </span>
                </li>
                @empty
                <p class="text-sm text-black">No categories defined yet.</p>
                @endforelse
            </ul>

            <h4 class="uppercase text-small font-bold pt-4 pb-4">Tags</h4>

            @if ($tags->isNotEmpty())
            @php
            // 1. Define Range and Available Sizes
            // You can adjust the font sizes here (from smallest to largest)
            $fontSizes = ['text-xs', 'text-sm', 'text-base', 'text-lg'];
            $sizeCount = count($fontSizes);

            // Find the min/max counts in the collection
            $minCount = $tags->min('posts_count');
            $maxCount = $tags->max('posts_count');

            // Handle edge case where all tags have the same count
            $range = ($maxCount > $minCount) ? ($maxCount - $minCount) : 1;
            @endphp

            @foreach ($tags as $tag)
            @php
            // 2. Calculate Proportional Size
            // This formula scales the tag's count to an index within the $fontSizes array
            $sizeIndex = floor((($tag->posts_count - $minCount) / $range) * ($sizeCount - 1));
            $fontSize = $fontSizes[$sizeIndex];

            // 3. Define Visual Appearance
            // Use a more prominent color/style for the largest tags
            $colorClass = ($fontSize == 'text-lg')
            ? 'bg-club text-white hover:bg-club-hover'
            : 'bg-[#4CBB17]/50 text-black hover:bg-club-hover';
            @endphp

            <a href="{{ route('blog.tag', $tag->slug) }}"
                class="{{ $fontSize }} {{ $colorClass }} font-sm py-1 px-3 rounded-full transition duration-200 whitespace-nowrap">
                #{{ $tag->name }}
            </a>
            @endforeach
            @else
            <p class="text-sm text-black">No tags currently in use.</p>
            @endif
        </aside>

    </div>
</div>
@endsection


{{--
| ----------------------------------------------------
| 4. Clear Trailing Sections
| ----------------------------------------------------
--}}
@section('testimonial_blocks')
{{-- Intentionally empty --}}
@endsection