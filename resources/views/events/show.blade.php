@extends('layouts.blog-base')

@section('title', 'Events Calendar')

@section('page_content')
<div class="mx-auto pt-10">
    <div class="flex flex-col lg:flex-row gap-10">
        <div class="w-full lg:w-3/4">
            <h4 class="uppercase text-xs font-bold">{{ $event->host }}</h4>
            <h1 class="font-heading text-7xl">{{ $event->name }}</h1>

            <p class="text-base mb-2">{{ $event->about }}</p>
        </div>
        <aside class="w-full lg:w-1/4 pt-4 lg:pt-0">
            {{-- STATIC FILTER/SEARCH AREA --}}
            <div class="mb-10 p-4">
                <div class="flex flex-col md:flex-column gap-4">

                    @if ($event->location)
                    <p class="text-sm text-black mt-1 flex items-center">
                        <svg class="w-4 h-4 mr-1 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        {{ $event->location }}
                    </p>
                    @endif

                    @if ($event->event_link)
                    <a href="{{ $event->event_link }}" target="_blank" class="text-center px-4 py-4 text-sm font-medium text-white bg-{{ $event->category_name }} hover:bg-{{ $event->category_name }}-hover transition-colors duration-200">
                        Learn More
                    </a>
                    @endif
                </div>
            </div>
        </aside>
    </div>


</div>
@endsection