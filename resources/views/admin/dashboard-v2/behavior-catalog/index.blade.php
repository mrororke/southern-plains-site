@extends('admin.dashboard-v2.desktop')

@section('content')
    <div class="dashboard-content">
        <!-- HEADER IMAGE -->
         <div class="py-4">
            <img src="{{ asset('images/headers/header-behavior-catalog.jpg') }}" alt="Hamish, a Shetland Sheepdog, at a quarry box." class="rounded-md">
        </div>
        <!-- Page Heading  -->
         <div class="flex justify-between items-center mb-6">
            <h1 class="font-heading text-7xl">Behavior Catalog</h1>
            <a href="{{ route('admin.trick-catalog.create') }}"
                class="inline-flex items-center justify-center rounded-md
                bg-sp-deepGranite px-4 py-2 text-sm font-medium text-sp-softWhite transition-colors duration-200 hover:bg-sp-controlledLime">
                + New Behavior
            </a>
        </div>

        <div class="grid grid-cols-12 h-full">
            <div class="col-span-8">
                Table will go here
            </div>
            <div class="col-span-4">
                Trick Info will go here.
            </div>
        </div>
    </div><!--  End Dashboard content -->
        
@endsection