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
                    <article class="border-b pb-8">
                <img src="{{ asset('images/blog-large-preview.jpg') }}"
                    alt="Placeholder image of a dog training"
                    class="w-full h-96 object-cover shadow-md mb-6">
                <p class="text-sm font-semibold uppercase text-[#4CBB17] mb-2">Training</p>
                <h3 class="text-4xl font-heading font-extrabold text-gray-900 mb-3">
                    Title of the Latest Post Goes Here
                </h3>
                <p class="text-base text-gray-600 mb-4">
                    This is the excerpt for the main article. In the functional version, this content would be pulled directly from the database and truncated.
                </p>
                <a href="#" class="text-[#4CBB17] font-medium hover:text-pink-800">Read More &rarr;</a>
            </article>
                </div>
                <div class="w-full lg:w-1/4">
                    <article class="border-b pb-8">
                <img src="{{ asset('images/blog-small-preview.jpg') }}"
                    alt="Placeholder image of a dog training"
                    class="w-full h-48 object-cover shadow-md mb-6">
                <p class="text-xs font-semibold uppercase text-[#4CBB17] mb-2">Training</p>
                <h3 class="uppercase text-base font-bold">Categories &amp; Tags
                </h3>
                <p class="text-small text-gray-600 mb-4">
                    This is the excerpt for the main article. In the functional version, this content would be pulled directly from the database and truncated.
                </p>
                <a href="#" class="text-[#4CBB17] font-medium hover:text-pink-800">Read More &rarr;</a>
            </article>
                </div>

            </div>

            
        </div>

        {{-- OLDER POSTS / ARCHIVE (Right Side: 1/4 Width) --}}
        <aside class="w-full lg:w-1/4 pt-4 lg:pt-0">
            <h4 class="uppercase text-small font-bold">Categories &amp; Tags</h4>

            <ul class="space-y-4">
                <li class="pb-2 border-b">
                    <a href="#" class="text-base font-medium text-gray-700 hover:text-pink-600 block leading-snug">Older Post Title Example 1</a>
                    <p class="text-xs text-gray-500 mt-0.5">Jan 2025</p>
                </li>
                <li class="pb-2 border-b">
                    <a href="#" class="text-base font-medium text-gray-700 hover:text-pink-600 block leading-snug">Older Post Title Example 2</a>
                    <p class="text-xs text-gray-500 mt-0.5">Dec 2024</p>
                </li>
                <li class="pb-2 border-b">
                    <a href="#" class="text-base font-medium text-gray-700 hover:text-pink-600 block leading-snug">Older Post Title Example 3</a>
                    <p class="text-xs text-gray-500 mt-0.5">Nov 2024</p>
                </li>
                <li class="pb-2">
                    <a href="#" class="text-base font-medium text-gray-700 hover:text-pink-600 block leading-snug">Older Post Title Example 4</a>
                    <p class="text-xs text-gray-500 mt-0.5">Oct 2024</p>
                </li>
            </ul>
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