@extends('layouts.blog-base')

@section('page_content')
<div class="mx-auto max-w-4xl pt-10 pb-10">
    <div class="flex flex-col lg:flex-row gap-10">
        <div class="w-full lg:w-3/4">
            <h4 class="uppercase text-xs font-bold">Ask Us Anything</h4>
            <h1 class="font-heading text-7xl">Get in Touch With<br />Southern Plains.</h1>

        </div>
        <div class="lg:w-1/4">
            <img src="{{ asset('images/error-hamish.png') }}"
                alt="Hamish"
                class="w-full ml-4">
        </div>
    </div>

</div>
@endsection