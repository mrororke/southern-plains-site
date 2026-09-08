@extends('public-v2.layouts.app')

@section('content')


    <div class="grid grid-cols-12 py-8 px-8">
        <div class="col-span-12 md:col-span-4">
            <div class="">
                Icon
            </div>
            <div class="">
                Play
            </div>
        </div>
        <div class="col-span-12 md:col-span-4">
            Column
        </div>
        <div class="col-span-12 md:col-span-4">
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