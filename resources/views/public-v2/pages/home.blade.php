@extends('public-v2.layouts.app')

@section('content')


    <div class="grid grid-cols-12 py-8 px-8">
        <div class="col-span-12 md:col-span-4 gap-4 flex">
            <div>
                <x-icons.dog class="text-sp-prairieGreen w-24 h-24"/>
            </div>
            <div>
                <h4 class="font-display text-base text-sp-prairieGreen">Let Dogs Be Dogs.</h4>
                <h3 class="font-sans text-lg text-sp-prairieGreen">Play</h3>
                <p class="body-large">Create experiences that tap into natural instincts, spark joy, and build confidence.</p>
                <a href"" class="flex items-center text-sp-prairieGreen">Learn More &NonBreakingSpace;<x-icons.move-right /></a>
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