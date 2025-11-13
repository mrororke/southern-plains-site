@extends('layouts.blog-base')

@section('title', 'Events Calendar')

@section('page_content')
<div class="container mx-auto px-4 py-12">
    <h4 class="uppercase text-xs font-bold">Southern Plains Events</h4>
    <h1 class="font-heading text-7xl">Training, Community,<br />and Competition.</h1>

    <p class="text-base mb-2">This is your comprehensive guide to the club's activities. Find the dates and details for upcoming<br />League Training Days, essential Club Meetings, and specialized Training Seminars. Whether you're<br />a competitor looking to secure your Top Dog title or a member seeking community, plan your participation here.</p>

   <!-- Calendar List: Using space-y-8 to separate monthly blocks -->
    <div class="space-y-12">
        @foreach ($events->groupBy(fn($event) => $event->date->format('F Y')) as $monthYear => $monthlyEvents)

            <!-- 1. FULL WIDTH MONTH HEADER -->
            <h3 class="uppercase font-extrabold text-2xl tracking-wider text-white bg-gray-800 p-4 rounded-t-lg shadow-md">
                {{ $monthYear }}
            </h3>

            <!-- 2. NESTED GRID FOR EVENT CARDS -->
            <!-- The grid is applied here, making the event cards the children of the grid -->
            <div class="grid md:grid-cols-2 gap-6 pt-2">
                @foreach ($monthlyEvents as $event)
                
                    <!-- Event Card -->
                    <div class="
                        event-card 
                        {{ $event->category_class }} 
                        p-6 rounded-lg 
                        shadow-lg 
                        border-b-4 
                        border-transparent 
                        hover:shadow-xl 
                        hover:border-gray-800 
                        transition-all 
                        duration-300
                    ">
                        
                        <!-- Category Tag -->
                        <span class="text-xs font-semibold px-3 py-1 rounded-full border border-black/50 mb-3 inline-block">
                            {{ $event->category_name }}
                        </span>

                        <h4 class="text-2xl font-bold mb-2 text-gray-900">
                            {{ $event->name }}
                        </h4>
                        
                        <!-- Date & Location -->
                        <div class="flex items-center text-sm text-gray-700 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="font-medium text-lg">{{ $event->date->format('M j, Y') }}</span>
                            <span class="mx-3 text-gray-400">|</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-sm">{{ $event->location }}</span>
                        </div>

                        <!-- Details Link -->
                        <a href="{{ route('events.show', $event->slug) }}" class="inline-flex items-center text-sm font-semibold text-gray-800 hover:text-gray-600 transition duration-150 mt-2">
                            View Details
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                        
                    </div>
                @endforeach
            </div>
            <!-- END: NESTED GRID -->

        @endforeach
    </div>


</div>

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