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
    <div>
        Filters will go here.
    </div>

    <div class="grid grid-cols-12 h-full">
        <div class="col-span-8 py-4">
            <table class="w-full text-sp-deepGranite border border-sp-darkGranite mb-6 [&_tbody_tr]:bg-sp-alloyGray [&_tbody_tr:hover]:bg-sp-controlledLime/20">
                <thead>
                    <tr class="bg-sp-deepGranite border-b border-sp-darkGranite">
                        <th class="p-3 text-left text-sp-softWhite text-base uppercase" width="75%">Name</th>
                        <th class="p-3 text-sp-softWhite text-base uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-sm">
                        <td class="p-3">
                            Trick name<br />
                            <span class="text-xs italic">Categories</span>
                        </td>
                        <td class="p-3 text-center">
                            <a href="#"
                                class="inline-flex items-center justify-center rounded-md
                                    bg-sp-deepGranite px-4 py-2 text-sm font-medium text-sp-softWhite
                                    transition-colors duration-200hover:bg-sp-darkGranite">
                                Edit
                            </a>

                            <button type="button"
                                class="inline-flex items-center justify-center rounded-md
                                border border-sp-alloyGray bg-white px-4 py-2
                                text-sm font-medium text-sp-darkGranite
                                transition-colors duration-200 hover:bg-sp-softWhite"
                                data-id="">
                                View
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="col-span-4 py-4">
            <div class="rounded-md bg-sp-alloyGray ml-4 mr-4 p-4 border border-b">
                <h2 class="font-heading text-4xl">Crawl</h2>
                <a href="#"
                                class="inline-flex items-center justify-center rounded-md
                                    bg-sp-deepGranite px-4 py-2 text-sm font-medium text-sp-softWhite
                                    transition-colors duration-200hover:bg-sp-darkGranite">
                                Copy Simple
                            </a>
                    <a href="#"
                                class="inline-flex items-center justify-center rounded-md
                                border border-sp-alloyGray bg-white px-4 py-2
                                text-sm font-medium text-sp-darkGranite
                                transition-colors duration-200 hover:bg-sp-softWhite">
                                Copy Grouped
                            </a>
                        <div>
                            Next section
                        </div>
            </div>
        </div>
    </div>
</div><!--  End Dashboard content -->

@endsection