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
                    <div class="mt-4 flex-shrink-0 flex flex-row space-x-2 w-full md:w-auto">
                        <a href="{{ route('events.show', $event->slug) }}" class="text-center px-4 py-4 text-sm font-medium text-white bg-{{ $event->category_name }} hover:bg-{{ $event->category_name }}-hover transition-colors duration-200">
                            View Details
                        </a>
                        @if ($event->event_link)
                        <a href="{{ $event->event_link }}" target="_blank" class="text-center px-4 py-4 text-sm font-medium text-black border border-{{ $event->category_class }} hover:bg-{{ $event->category_name }}-hover hover:text-white transition-colors duration-200">
                            Learn More
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </aside>
    </div>


</div>
@endsection