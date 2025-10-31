@extends('layouts.blog-base')

{{-- 1. SEO METADATA: Utilizes the slots defined in your base.blade.php --}}
@section('metaTitle', $post->meta_title ?? $post->title)
@section('metaDescription', $post->meta_description ?? Str::limit($post->body, 160))
@section('ogImage', asset($post->hero_image_path)) 

@section('page_content')
<div class="container mx-auto pt-8 pb-8">

@if (! $post->is_book_review)

    {{-- Post Header and Hero Image --}}
    <div class="mb-10">
        <a href="{{ route('blog.category', $post->category->slug) }}" class="uppercase text-xs font-bold text-club inline-block hover:text-black transition">
            {{ $post->category->name }}
        </a>
        
        {{-- Title --}}
        <h1 class="text-5xl font-heading text-black mb-4 leading-tight">
            {!! $post->title !!}
        </h1>

        {{-- Author and Date --}}
        <p class="text-sm text-gray-600">
            By <span class="font-medium text-black">{{ $post->author->name ?? "Melanie O'Rorke" }}</span>
            on {{ $post->published_at->format('F jS, Y') }}
        </p>
    </div>

    {{-- Hero Image (Full Width within the Content Slot) --}}
    <img src="{{ asset($post->hero_image_path) }}"
        alt="{!! $post->title !!}"
        class="w-full object-cover shadow-xl mb-12 max-h-[600px]">

    {{-- ---------------------------------------------------- --}}
    {{-- 2. POST CONTENT (The full article body) --}}
    {{-- ---------------------------------------------------- --}}

    @if ($post->has_affiliate_links)
        <x-site.affiliate-disclaimer />
    @endif

    <article class="text-gray-800 leading-relaxed space-y-6">
        {{-- CRUCIAL: Use {!! ... !!} to render saved HTML (headings, lists, formatting) --}}
        {!! $post->body !!}
    </article>

    @else

    @else
        {{-- Specialized Book Review Layout --}}
        
        <h1 class="text-5xl font-heading font-extrabold text-black mb-10 leading-tight">
            Review: {{ $post->title }}
        </h1>
        
        <div class="flex flex-col lg:flex-row gap-8">
            
            {{-- Book Info Block (Right-side float structure) --}}
            <aside class="lg:w-1/3 w-full lg:order-2">
                <div class="bg-gray-50 border p-6 rounded-lg sticky top-8">
                    
                    {{-- Assuming hero_image_path is used for the cover --}}
                    <img src="{{ asset($post->hero_image_path) }}" 
                         alt="Cover of {{ $post->title }}"
                         class="w-2/3 mx-auto shadow-lg mb-4">
                         
                    <h3 class="text-xl font-bold mb-1 text-center">{{ $post->title }}</h3>
                    <p class="text-sm text-gray-600 mb-4 text-center">by {{ $post->author->name ?? 'N/A' }}</p>
                    
                    {{-- Star Rating Display (Uses the new rating column) --}}
                    @if ($post->rating)
                        <div class="flex justify-center mb-4">
                            <x-blog.star-rating :rating="$post->rating" />
                        </div>
                    @endif

                    {{-- Link to buy the book (Placeholder) --}}
                    <a href="#" class="block w-full text-center bg-[#4CBB17] text-white font-bold py-2 rounded hover:bg-club-hover transition" 
                       target="_blank" rel="sponsored noopener" title="Buy the book: {{ $post->title }}">
                        Buy the Book
                    </a>
                </div>
            </aside>

            {{-- Review Content (Left-side/Main Content) --}}
            <article class="lg:w-2/3 w-full lg:order-1 prose max-w-none text-gray-800">
                {!! $post->body !!}
            </article>

        </div>
    @endif

    {{-- ---------------------------------------------------- --}}

    {{-- 3. Post Tags --}}
    @if ($post->tags->count())
    <div class="mt-12 pt-6 border-t border-gray-200">
        <span class="text-sm font-semibold text-gray-700 mr-3">Tags:</span>
        @foreach ($post->tags as $tag)
            <a href="{{ route('blog.tag', $tag->slug) }}"
               class="inline-block bg-gray-100 text-gray-700 text-xs font-medium px-3 py-1 rounded-full hover:bg-gray-200 transition mb-2">
                #{{ $tag->name }}
            </a>
        @endforeach
    </div>
    @endif


</div>
@endsection