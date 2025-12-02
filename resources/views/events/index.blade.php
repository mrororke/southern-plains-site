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

    </div>

    <div class="space-y-6">
        @foreach ($events->groupBy(fn($event) => $event->date->format('F Y')) as $monthYear => $monthlyEvents)
        <h3 class="uppercase font-semibold bg-black text-white p-2">{{ $monthYear }}</h3>
        <div class="grid md:grid-cols-2 gap-6">
            @foreach ($monthlyEvents as $event)
           
             

            <!-- Event Card -->
            <div class="event-card flex bg-{{ $event->category_class }}/25 text-black p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="p-6 md:flex md:items-center">
                    <div class="flex-shrink-0 mb-4 md:mb-0 text-center md:pr-6">
                        <p class="text-4xl font-bold text-black">{{ $event->date->format('d') }}</p>
                        <p class="text-xs text-black uppercase">{{ $event->date->format('l') }}</p>
                    </div>
                </div>

                <div class="md:flex-grow md:pl-6">
                    <div class="flex items-center justify-between">
                        <p>{{ $event->category_name }}</p>
                        <span class="text-xs font-semibold tracking-wider uppercase">
                            {{ $event->host }}
                        </span>
                    </div>

                    {{-- Event Name --}}
                    <a href="{{ route('events.show', $event->slug) }}" class="block">
                        <h2 class="font-heading text-3xl mb-2 hover:text-{{ $event->category_name }} transition-colors duration-200">
                            {{ $event->name }}
                        </h2>
                    </a>

                    {{-- Location --}}
                    @if ($event->location)
                    <p class="text-sm text-black mt-1 flex items-center">
                         <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($event->location) }}" 
       target="_blank" 
       rel="noopener noreferrer" 
       class="flex items-center hover:text-decoration-solid transition-colors duration-200">
        
        <svg class="w-4 h-4 mr-1 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
        </svg>
        
        {{ $event->location }}
    </a>
                    </p>
                    @endif

                    {{-- Description Snippet --}}
                    @if ($event->about)
                    <p class="text-black mt-3 text-sm line-clamp-2">
                        {{ Str::limit($event->about, 250) }}
                    </p>
                    @endif

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


            @endforeach
        </div>
        @endforeach

    </div>
    <!--  End of Loops -->


</div>
</div>
@endif
</div>
@endsection