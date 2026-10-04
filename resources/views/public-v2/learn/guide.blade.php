@extends('public-v2.layouts.app')

@section('hero')

{{-- Learn Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 gap-6 px-6 pt-8 pb-12 md:px-8 md:pt-12 md:pb-16">

    <div class="col-span-12 md:col-span-1">
        <!-- Empty Cell -->
     </div>

    {{-- Intro --}}
    <div class="col-span-12 md:col-span-7">
        Intro
    </div>
     <div class="col-span-12 md:col-span-1">
        <!-- Empty Cell -->
     </div>
    <div class="col-span-12 md:col-span-2 md:p-6 md:border-l border-sp-warmStone">
        Sticky Nav
    </div>

     <div class="col-span-12 md:col-span-1">
        <!-- Empty Cell -->
     </div>

</div>
@endsection