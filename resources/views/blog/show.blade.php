@extends('layouts.blog-base')

{{-- 1. SEO METADATA: Utilizes the slots defined in your base.blade.php --}}
@section('metaTitle', $post->meta_title ?? $post->title)
@section('metaDescription', $post->meta_description ?? Str::limit($post->body, 160))
@section('ogImage', asset($post->hero_image_path)) 

@section('page_content')
<div class="container mx-auto px-6 py-12">

    {{-- Post Header and Hero Image --}}
    <div class="mb-10">
        <a href="{{ route('blog.category', $post->category->slug) }}" class="uppercase text-xs font-bold text-club inline-block hover:text-black transition">
            {{ $post->category->name }}
        </a>
        
        {{-- Title --}}
        <h1 class="text-6xl font-heading text-black mb-4 leading-tight">
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
        alt="{{ $post->title }}"
        class="w-full object-cover shadow-xl mb-12 max-h-[600px]">

    {{-- ---------------------------------------------------- --}}
    {{-- 2. POST CONTENT (The full article body) --}}
    {{-- ---------------------------------------------------- --}}

    <article class="text-gray-800 leading-relaxed space-y-6">
        {{-- CRUCIAL: Use {!! ... !!} to render saved HTML (headings, lists, formatting) --}}
        {!! $post->body !!}
    </article>

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