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
                    <x-blog.search-filter :categories="$categories" />
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
                    @forelse ($allPostsOnPage->take(3) as $post)
                <article class="border-b pb-8">
                    {{-- Large Article Design --}}
                    <a href="{{ route('blog.show', $post->slug) }}">
                        <img src="{{ asset($post->hero_image_path) }}" alt="{{ $post->title }}" class="w-full h-96 object-cover shadow-md mb-6">
                    </a>
                    <p class="text-sm font-semibold uppercase text-[#4CBB17] ">{{ $post->category->name }}</p>
                    <h3 class="text-4xl font-heading font-extrabold text-black mb-3">
                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                    </h3>
                    <p class="text-base text-gray-900 mb-4">{!! Str::limit($post->body, 350) !!}</p>
                    <a href="{{ route('blog.show', $post->slug) }}" class="text-[#4CBB17] font-medium hover:text-club-hover">Read More &rarr;</a>
                </article>
            @empty
                <p class="text-gray-500">No featured posts are currently available.</p>
            @endforelse

                    {{-- Placeholder for Pagination or "Load More" button --}}
                    <div class="py-6 text-center">
                        {{-- {{ $latestPosts->links() }} --}}
                    </div>
                </div>
                <div class="w-full lg:w-1/4">
                    @forelse ($allPostsOnPage->skip(3) as $post)
                <article class="pb-6 border-b">
                    {{-- Small Article Design --}}
                    <a href="{{ route('blog.show', $post->slug) }}">
                        <img src="{{ asset($post->hero_image_path) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover shadow-md mb-3">
                    </a>
                    <p class="text-xs font-semibold uppercase text-[#4CBB17]">{{ $post->category->name }}</p>
                    <h4 class="uppercase text-sm font-bold leading-snug mb-2">
                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                    </h4>
                    <a href="{{ route('blog.show', $post->slug) }}" class="text-[#4CBB17] text-xs font-medium hover:text-club-hover">Read More &rarr;</a>
                </article>
            @empty
                <p class="text-sm text-gray-500">No older articles to display.</p>
            @endforelse
                </div>
                <div class="py-10">
                    {{-- {{ $latestPosts->links() }} --}}
                </div>
            </div>
{{-- 3. PAGINATION SECTION (FULL WIDTH) --}}
    <div class="py-10">
        <div class="flex justify-center">
            {{-- UNCOMMENT THIS CODE --}}
            {!! $allPostsOnPage->links() !!}
        </div>
    </div>

        </div>

        <x-blog.aside/>

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