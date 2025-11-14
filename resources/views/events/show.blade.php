@extends('layouts.blog-base')

@section('title', 'Events Calendar')

@section('page_content')
<div class="container mx-auto px-4 py-12">
    <h4 class="uppercase text-xs font-bold">{{ $event->host }}</h4>
    <h1 class="font-heading text-7xl">{{ $event->name }}</h1>

    <p class="text-base mb-2">This is your comprehensive guide to the club's activities. Find the dates and details for upcoming<br />League Training Days, essential Club Meetings, and specialized Training Seminars. Whether you're<br />a competitor looking to secure your Top Dog title or a member seeking community, plan your participation here.</p>



    <div class="space-y-6">
        

    </div>

    <!-- Header Accent and Primary Info -->
        <div class="p-6 md:p-8 rounded-t-xl">
            <!-- Event Name -->
            <h1 class="text-3xl md:text-5xl font-extrabold text-black leading-tight mb-2">
                {{ $event->name }}
            </h1>
            
            <!-- Host Information -->
            @if ($event->host_club_name)
                <p class="text-lg md:text-xl font-semibold text-black/80">
                    Hosted by: {{ $event->host_club_name }}
                </p>
            @endif
        </div>
        
        <!-- Rest of the Content Section -->
        <div class="p-6 md:p-8 space-y-6">

            <!-- Placeholder for Date, Location, and About -->
            <div class="border-b pb-4">
                <h3 class="text-xl font-bold text-gray-700 mb-2">Details</h3>
                <p class="text-gray-600">
                    <!-- This is where the rest of the event details will go -->
                    Date: {{ $event->date->format('F jS, Y') }}
                </p>
            </div>
            
            <p>
                The full event description, links, and all other details will be placed here.
            </p>
        </div>


</div>
@endsection