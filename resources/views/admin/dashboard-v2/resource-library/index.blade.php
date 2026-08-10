@vite('resources/js/admin/resource-library/index.js')

@extends('admin.dashboard-v2.desktop')

@section('title', 'Resource Library')

@section('content')

<div class="dashboard-content">
    <div class="py-4">
        <img src="{{ asset('images/headers/resourceLibrary.jpg') }}" alt="Hamish, a Shetland Sheepdog, looking at the camera." class="rounded-md">
    </div>

    <x-admin.layout.page-header
        title="Resource Library"
        description="Find, read, reuse, and evolve training communications and resources."
    />

    {{-- Search and filters --}}
    @include(
        'admin.dashboard-v2.resource-library.components.toolbar'
    )

    {{-- Resource workspace --}}
    <div
        class="grid min-h-0 grid-cols-[minmax(0,3fr)_minmax(0,7fr)]
               gap-6"
    >

        {{-- Resource Index --}}
        <aside
            class="min-h-0 overflow-y-auto"
            aria-label="Resource index"
        >
            @include(
                'admin.dashboard-v2.resource-library.components.resource-index'
            )
        </aside>

        {{-- Reader --}}
        <main
            class="min-h-0 overflow-y-auto"
            aria-label="Resource reader"
        >
            @include(
                'admin.dashboard-v2.resource-library.components.reader'
            )
        </main>

    </div>

</div>

@endsection