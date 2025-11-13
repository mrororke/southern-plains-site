@extends('layouts.blog-base')

@section('title', 'Events Calendar')

@section('page_content')
<div class="container mx-auto px-4 py-12">
    <h4 class="uppercase text-xs font-bold">Southern Plains Events</h4>
    <h1 class="font-heading text-7xl">Training, Community,<br />and Competition.</h1>

    <p class="text-base mb-2">This is your comprehensive guide to the club's activities. Find the dates and details for upcoming<br />League Training Days, essential Club Meetings, and specialized Training Seminars. Whether you're<br />a competitor looking to secure your Top Dog title or a member seeking community, plan your participation here.</p>

    <div class="container mx-auto py-6">
        @if ($events->isEmpty())
        <h3 class="font-heading text-5xl mb-6">No events currently scheduled.</h3>
        <p class="text-base mb-2">Check back soon! We are currently working on planning our next training days and club meetings.</p>
        @else

        // New loop start:
        @foreach ($events->groupBy(fn($event) => $event->date->format('F Y')) as $monthYear => $monthlyEvents)
        {{-- $monthYear will be "November 2025" --}}
        {{-- $monthlyEvents is a collection of all events in that month --}}
        @endforeach

        <div class="grid md:grid-cols-2 gap-4 text-center">
            <div>One</div>
            <div>Two</div>
        </div>

    </div>


    <div class="space-y-6">
        @foreach ($events as $event)
        {{-- Event Card --}}
        <div class="event-card bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden border-l-4 {{ $event->category_class }}">
            <div class="p-6 md:flex md:items-center">

                {{-- Date Block (Fixed Width) --}}
                <div class="flex-shrink-0 mb-4 md:mb-0 md:w-32 text-center border-b md:border-b-0 md:border-r md:pr-6">
                    <p class="text-sm font-semibold uppercase text-gray-500">{{ $event->date->format('M') }}</p>
                    <p class="text-4xl font-bold text-gray-900">{{ $event->date->format('d') }}</p>
                    <p class="text-sm text-gray-500">{{ $event->date->format('Y') }}</p>
                </div>

                {{-- Details Block --}}
                <div class="md:flex-grow md:pl-6">
                    <div class="flex items-center justify-between">
                        {{-- Category Badge --}}
                        <span class="px-3 py-1 text-xs font-semibold tracking-wider uppercase rounded-full border {{ $event->category_class }}">
                            {{ $event->category_name }}
                        </span>
                    </div>

                    {{-- Event Name --}}
                    <a href="{{ route('events.show', $event->slug) }}" class="block mt-2">
                        <h2 class="text-2xl font-bold text-gray-900 hover:text-indigo-600 transition-colors duration-200">
                            {{ $event->name }}
                        </h2>
                    </a>

                    {{-- Location --}}
                    @if ($event->location)
                    <p class="text-sm text-gray-700 mt-1 flex items-center">
                        <svg class="w-4 h-4 mr-1 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        {{ $event->location }}
                    </p>
                    @endif

                    {{-- Description Snippet --}}
                    @if ($event->about)
                    <p class="text-gray-500 mt-3 text-sm line-clamp-2">
                        {{ Str::limit($event->about, 150) }}
                    </p>
                    @endif
                </div>

                {{-- Action Links --}}
                <div class="mt-4 md:mt-0 md:ml-6 flex-shrink-0 flex flex-col space-y-2 w-full md:w-auto">
                    <a href="{{ route('events.show', $event->slug) }}" class="text-center px-4 py-2 text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 transition-colors duration-200 shadow-md">
                        View Details
                    </a>
                    @if ($event->event_link)
                    <a href="{{ $event->event_link }}" target="_blank" class="text-center px-4 py-2 text-sm font-medium rounded-lg text-indigo-600 border border-indigo-600 hover:bg-indigo-50 transition-colors duration-200">
                        Register / Learn More
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection