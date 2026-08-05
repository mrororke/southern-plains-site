@vite('resources/js/admin/trick-catalog/index.js')
@vite('resources/js/admin/behavior-catalog/index.js')
@extends('admin.dashboard-v2.desktop')

@section('title', 'Behavior Catalog')

@section('content')

<div class="dashboard-content">
    <div class="py-4">
        <img src="{{ asset('images/headers/behavior-catalog.jpg') }}" alt="Hamish, a Shetland Sheepdog, at a quarry box." class="rounded-md">
    </div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="font-sans text-sp-charcoal font-semibold text-6xl">Behavior Catalog</h1>
        <a href="{{ route('admin.trick-catalog.create') }}"
            class="inline-flex items-center justify-center rounded-md
                bg-sp-prairieGreen px-4 py-2 text-sm font-medium text-sp-warmIvory transition-colors duration-200 hover:bg-sp-prairieOchre">
            + New Behavior
        </a>
    </div>
    <x-admin.behaviors.filters :levels="$levels" />
        <p class="text-sm text-sp-slate">
            Showing
            <strong>{{ $tricks->firstItem() ?? 0 }}</strong>
            –
            <strong>{{ $tricks->lastItem() ?? 0 }}</strong>
            of
            <strong>{{ $tricks->total() }}</strong>
            behaviors
        </p>

    <div
        x-data="behaviorCatalog()"
        class="grid grid-cols-12">


        <div class="col-span-8 py-4">
            <x-admin.behaviors.table :tricks="$tricks" />
            <div class="mt-4">
                {{ $tricks->links() }}
            </div>
        </div>
        <div class="col-span-4 py-4">
            <x-admin.behaviors.detail-card
                selected-behavior="selectedBehavior"
                copy-simple-action="copySimple()"
                copy-grouped-action="copyGrouped()" />


        </div>
    </div>
</div><!--  End Dashboard content -->

@endsection