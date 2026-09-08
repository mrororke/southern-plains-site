@extends('public-v2.layouts.app')

@section('content')


    <div class="grid grid-cols-12 py-8 px-8">
        <div class="col-span-12 md:col-span-4 flex">
            <div>
                <x-icons.dog />
            </div>
            <div>
                <h4>Let Dogs Be Dogs.</h4>
                <h3>Play</h3>
                <p class="">Create experiences that tap into natural instincts, spark joy, and build confidence.</p>
                <a href"">Learn More <x-icons.move /></a>
            </div>
        </div>
        <div class="col-span-12 md:col-span-4 flex">
            Column
        </div>
        <div class="col-span-12 md:col-span-4 flex">
            Column
        </div>
    </div>

    <!-- End of 3-Up -->

    <div class="grid grid-cols-12 py-8 px-8">
        <div class="col-span-12 md:col-span-6">
            Column events
        </div>
        <div class="col-span-12 md:col-span-6">
            Column
        </div>
    </div>

    <!-- End Events section -->



    @endsection