@extends('layouts.blog-base')

{{-- 
| ----------------------------------------------------
| SEO SLOTS
| ----------------------------------------------------
--}}
@section('metaTitle', 'Blog | Insights, Training Tips, and Stories')
@section('metaDescription', 'Read the latest articles from Southern Plains Sport Dog Club, covering positive reinforcement training, NASDA, and more.')


{{-- 
| ----------------------------------------------------
| 1. Clear Sidebar/Slider (Ensures the main content is full width)
| ----------------------------------------------------
--}}
@section('slider_column')
    {{-- This section is intentionally left empty to remove the sidebar. --}}
@endsection


{{-- 
| ----------------------------------------------------
| 2. Blog Introduction & Filter (Top section, full width, centered)
| ----------------------------------------------------
--}}
@section('page_content')
    <div class="max-w-4xl mx-auto py-12">
        <h4 class="uppercase text-sm font-bold tracking-wider text-gray-500 mb-2">The Southern Plains Dispatch</h4>
        <h1 class="font-heading text-6xl text-gray-900 mb-4">Insights for the Modern Handler</h1>
        <p class="text-xl text-gray-700 mb-8">
            Tips, stories, and deep dives into positive reinforcement training, canine conditioning, and the joy of sport dog competition.
        </p>
        
        {{-- Search/Filter Component Placeholder --}}
        <div class="mb-10 p-4 bg-gray-50 border border-gray-200 rounded-lg">
            {{-- This component should contain your search bar and filter dropdowns (e.g., by category, month) --}}
            <x-blog.search-filter /> 
        </div>
    </div>
@endsection


{{-- 
| ----------------------------------------------------
| 3. Main Blog Roll (Full Width, Two-Column Content Structure)
| ----------------------------------------------------
--}}
{{-- We use 'feature_blocks' here as a full-width container below the intro --}}
@section('feature_blocks') 
    <div class="container mx-auto px-6 py-12">
        
        {{-- Flex container for the 3/4 and 1/4 split --}}
        <div class="flex flex-col lg:flex-row gap-10">

            {{-- MAIN ARTICLES (Left Side: 3/4 Width) --}}
            <div class="w-full lg:w-3/4 space-y-16">
                
                {{-- Example: Loop through the main blog posts (use your actual $posts variable) --}}
                @foreach ($latestPosts as $post)
                    <article class="border-b pb-8">
                        <a href="{{ route('blog.show', $post) }}">
                            <img src="{{ asset($post->image_path) }}" 
                                 alt="{{ $post->image_alt }}" 
                                 class="w-full h-96 object-cover rounded-lg shadow-md mb-6 hover:shadow-xl transition duration-300">
                        </a>
                        <p class="text-sm font-semibold uppercase text-pink-600 mb-2">{{ $post->category }}</p>
                        <h2 class="text-4xl font-heading font-extrabold text-gray-900 mb-3 hover:text-pink-600 transition duration-300">
                            <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                        </h2>
                        <p class="text-base text-gray-600 mb-4">{{ Str::limit($post->body, 250) }}</p>
                        <div class="text-sm text-gray-500">
                            Posted on {{ $post->date->format('F d, Y') }} by {{ $post->author }}
                        </div>
                    </article>
                @endforeach
                
                {{-- Pagination Placeholder --}}
                <div class="py-6">
                    {{-- {{ $latestPosts->links() }} --}}
                </div>
            </div>

            {{-- OLDER POSTS / ARCHIVE (Right Side: 1/4 Width) --}}
            <aside class="w-full lg:w-1/4 pt-4 lg:pt-0">
                <h3 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-6">Recent & Archived</h3>
                
                {{-- Example: Loop through older/archived blog posts (use your actual $archivePosts variable) --}}
                <ul class="space-y-4">
                    @foreach ($archivePosts as $post)
                        <li class="pb-2 border-b last:border-b-0">
                            <a href="{{ route('blog.show', $post) }}" class="text-base font-medium text-gray-700 hover:text-pink-600 block leading-snug">
                                {{ $post->title }}
                            </a>
                            <p class="text-xs text-gray-500 mt-0.5">{{ $post->date->format('M Y') }}</p>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>
    </div>
@endsection


{{-- 
| ----------------------------------------------------
| 4. Clear Trailing Sections (To omit features/testimonials)
| ----------------------------------------------------
--}}
@section('testimonial_blocks')
    {{-- Intentionally empty --}}
@endsection