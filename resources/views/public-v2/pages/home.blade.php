@extends('public-v2.layouts.app')

@section('content')


    <div class="grid grid-cols-12 py-8 px-8">
        <div class="col-span-12 md:col-span-4 gap-4 flex">
            <div>
                <x-icons.dog class="text-sp-prairieGreen w-24 h-24"/>
            </div>
            <div>
                <h4 class="font-display font-bold text-2xl text-sp-prairieGreen">Let Dogs Be Dogs.</h4>
                <h3 class="font-sans text-4xl text-sp-charcoal uppercase">Play</h3>
                <p class="body">Create experiences that tap into natural instincts, spark joy, and build confidence.</p>
                <a href="#" class="learn-more-link">Learn More <x-icons.move-right /></a>
            </div>
        </div>
        <div class="col-span-12 md:col-span-4 gap-4 flex">
            <div>
                <x-icons.award class="text-sp-prairieGreen w-24 h-24"/>
            </div>
            <div>
                <h4 class="font-display font-bold text-2xl text-sp-prairieGreen">Build Better Partnerships.</h4>
                <h3 class="font-sans text-4xl text-sp-charcoal uppercase">Train</h3>
                <p class="body">Positive methods that strengthen communication, skills, and trust.</p>
                <a href="#" class="learn-more-link">Learn More <x-icons.move-right /></a>
            </div>
        </div>
        <div class="col-span-12 md:col-span-4 gap-4 flex">
            <div>
                <x-icons.sprout class="text-sp-prairieGreen w-24 h-24"/>
            </div>
            <div>
                <h4 class="font-display font-bold text-2xl text-sp-prairieGreen">Celebrate Every Victory.</h4>
                <h3 class="font-sans text-4xl text-sp-charcoal uppercase">Grow</h3>
                <p class="body">From first steps to new titles, we’re here to support your journey together.</p>
                <a href="#" class="learn-more-link">Learn More <x-icons.move-right /></a>
            </div>
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