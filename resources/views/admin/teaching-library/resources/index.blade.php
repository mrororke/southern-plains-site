@extends('layouts.portal')

@section('title', 'Teaching Library')

@section('content')

<div class="p-6">

    <div class="flex justify-between items-center mb-6">

        <div>

            <h1 class="font-heading text-4xl pb-2">
                Teaching Library
            </h1>

            <p class="text-sm text-gray-600 mt-1">
                Build, organize, and reuse teaching resources, lesson content, and emails.
            </p>

        </div>

        <a
            href="{{ route('admin.teaching-library.resources.create') }}"
            class="inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-training hover:bg-training-hover text-white">

            + New Resource

        </a>

    </div>

    @if(session('success'))

        <div class="border p-3 mb-6 text-sm">
            {{ session('success') }}
        </div>

    @endif

    {{-- =========================================================
    FILTERS
========================================================== --}}

<div class="border p-4 mb-6">

    <form method="GET">

        <div class="grid grid-cols-4 gap-4 items-end">


            {{-- SEARCH --}}

            <div>

                <label class="text-xs uppercase text-gray-500">
                    Search
                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search resources..."
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training">

            </div>


            {{-- CATEGORY --}}

            <div>

                <label class="text-xs uppercase text-gray-500">
                    Category
                </label>

                <select
                    name="category"
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training">

                    <option value="">
                        All Categories
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            @selected(request('category') == $category->id)>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- STATUS --}}

            <div>

                <label class="text-xs uppercase text-gray-500">
                    Status
                </label>

                <select
                    name="status"
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training">

                    <option value="">
                        All Statuses
                    </option>

                    <option value="draft"
                        @selected(request('status') === 'draft')>
                        Draft
                    </option>

                    <option value="published"
                        @selected(request('status') === 'published')>
                        Published
                    </option>

                    <option value="archived"
                        @selected(request('status') === 'archived')>
                        Archived
                    </option>

                </select>

            </div>


            {{-- TEMPLATE --}}

            <div>

                <label class="inline-flex items-center">

                    <input
                        type="checkbox"
                        name="template"
                        value="1"
                        class="border-gray-300"
                        @checked(request('template'))>

                    <span class="ml-2 text-sm">
                        Templates Only
                    </span>

                </label>

            </div>


        </div>


        <div class="mt-4">

            <button
                class="inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-training hover:bg-training-hover text-white">

                Filter

            </button>


            <a
                href="{{ route('admin.teaching-library.resources.index') }}"
                class="inline-flex items-center px-2 py-1 text-xs uppercase border ml-2">

                Clear

            </a>

        </div>

    </form>

</div>


    {{-- =========================================================
        LIBRARY STATS
    ========================================================== --}}

    <div class="grid grid-cols-4 gap-4 mb-6">

        <div class="border p-4">

            <div class="text-xs uppercase text-gray-500">
                Resources
            </div>

            <div class="text-3xl font-semibold mt-2">
                {{ $stats['total'] }}
            </div>

        </div>

        <div class="border p-4">

            <div class="text-xs uppercase text-gray-500">
                Drafts
            </div>

            <div class="text-3xl font-semibold mt-2">
                {{ $stats['drafts'] }}
            </div>

        </div>

        <div class="border p-4">

            <div class="text-xs uppercase text-gray-500">
                Published
            </div>

            <div class="text-3xl font-semibold mt-2">
                {{ $stats['published'] }}
            </div>

        </div>

        <div class="border p-4">

            <div class="text-xs uppercase text-gray-500">
                Templates
            </div>

            <div class="text-3xl font-semibold mt-2">
                {{ $stats['templates'] }}
            </div>

        </div>

    </div>


    {{-- =========================================================
        TABLE
    ========================================================== --}}

    <div class="border rounded">

        <table class="w-full text-sm">

            <thead class="border-b bg-black text-white uppercase text-xs">

                <tr>

                    <th class="text-left px-4 py-3">
                        Internal Title
                    </th>

                    <th class="text-left px-4 py-3">
                        Category
                    </th>

                    <th class="text-left px-4 py-3">
                        Tags
                    </th>

                    <th class="text-center px-4 py-3">
                        Behaviors
                    </th>

                    <th class="text-left px-4 py-3">
                        Status
                    </th>

                    <th class="text-left px-4 py-3">
                        Updated
                    </th>

                    <th class="text-right px-4 py-3">

                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($resources as $resource)

                    <tr class="border-b">

                        {{-- TITLE --}}

                        <td class="px-4 py-3">

                            <a
                                href="{{ route('admin.teaching-library.resources.show', $resource) }}"
                                class="font-medium hover:underline">

                                {{ $resource->internal_title }}

                            </a>

                        </td>


                        {{-- CATEGORY --}}

                        <td class="px-4 py-3">

                            {{ $resource->category->name }}

                        </td>


                        {{-- TAGS --}}

                        <td class="px-4 py-3">

                            @forelse($resource->tags->take(2) as $tag)

                                <div>{{ $tag->name }}</div>

                            @empty

                                <span class="text-gray-400">—</span>

                            @endforelse

                            @if($resource->tags->count() > 2)

                                <div class="text-xs text-gray-500">

                                    +{{ $resource->tags->count() - 2 }} more

                                </div>

                            @endif

                        </td>


                        {{-- BEHAVIORS --}}

                        <td class="px-4 py-3 text-center">

                            @if($resource->tricks->count())

                                {{ $resource->tricks->count() }}

                            @else

                                —

                            @endif

                        </td>


                        {{-- STATUS --}}

                        <td class="px-4 py-3 capitalize">

                            {{ $resource->status }}

                        </td>


                        {{-- UPDATED --}}

                        <td class="px-4 py-3">

                            {{ $resource->updated_at->format('M j, Y') }}

                        </td>


                        {{-- ACTIONS --}}

                        <td class="px-4 py-3 text-right whitespace-nowrap">

                            <a
                                href="{{ route('admin.teaching-library.resources.show', $resource) }}"
                                class="inline-flex items-center px-3 py-1 text-xs bg-training text-white">

                                View

                            </a>

                            <a
                                href="{{ route('admin.teaching-library.resources.edit', $resource) }}"
                                class="inline-flex items-center px-3 py-1 text-xs bg-league text-white ml-2">

                                Edit

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="px-4 py-8 text-center text-gray-500">

                            No resources have been created yet.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">

        {{ $resources->links() }}

    </div>

</div>

@endsection