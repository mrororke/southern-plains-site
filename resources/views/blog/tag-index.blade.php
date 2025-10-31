@extends('layouts.blog-base')

@section('page_content')
<div class="container mx-auto px-6 py-12">

    {{-- Dynamic Title for the Filtered Page --}}
    <h1 class="text-4xl font-heading font-extrabold text-black mb-10 border-b pb-3">
        Articles Tagged: #<span class="text-[#4CBB17]">{{ $tag->name }}</span>
    </h1>

    <div class="flex flex-col lg:flex-row gap-10">
        <div class="w-full lg:w-3/4">
            @forelse ($posts as $post)
            <article class="border-b pb-8">
                {{-- Post Image (Linked) --}}
                <a href="{{ route('blog.show', $post->slug) }}">
                    <img src="{{ asset($post->hero_image_path) }}"
                        alt="{!! $post->title !!}"
                        class="w-full h-64 object-cover shadow-md mb-6">
                </a>

                {{-- Category --}}
                <p class="text-xs font-semibold uppercase text-[#4CBB17]">
                    {{ $post->category->name }}
                </p>

                {{-- Title (Linked) --}}
                <h3 class="uppercase text-base font-bold">
                    <a href="{{ route('blog.show', $post->slug) }}">{!! $post->title !!}</a>
                </h3>

                {{-- Excerpt/Body --}}
                <p class="text-sm text-black mb-4">
                    {!! $post->excerpt !!}
                </p>

                {{-- Read More Link --}}
                <a href="{{ route('blog.show', $post->slug) }}" class="text-[#4CBB17] font-medium hover:text-club-hover">Read More &rarr;</a>
            </article>
            @empty
            <p class="text-lg text-gray-600">No posts found with this tag.</p>
            @endforelse
        </div>
        <x-blog.aside :categories="$categories" :tags="$tags" />
    </div>
    <div class="py-10">
            {{ $posts->links() }}
        </div>

    
</div>
@endsection