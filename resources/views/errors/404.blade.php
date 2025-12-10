@extends('layouts.blog-base')

@section('page_content')
<div class="pt-10 pb-10">
    <div class="flex flex-col lg:flex-row gap-10">
        <div class="w-full">
            <h4 class="uppercase text-xs font-bold">Ask Us Anything</h4>
            <h1 class="font-heading text-7xl">Get in Touch With<br />Southern Plains.</h1>
            <img src="{{ asset('images/error-hamish.png') }}"
                alt="Hamish"
                class="w-full ml-4">

        </div>
    </div>

</div>
@endsection