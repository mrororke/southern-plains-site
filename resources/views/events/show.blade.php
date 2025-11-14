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
                    small column
                </div>
            </div>
        </aside>
    </div>


</div>
@endsection