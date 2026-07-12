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

        <a href="{{ route('admin.teaching-library.resources.create') }}"
            class="inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-training hover:bg-training-hover text-white">
            + New Resource
        </a>

    </div>

    @if(session('success'))

        <div class="border p-3 mb-6 text-sm">
            {{ session('success') }}
        </div>

    @endif

    <div class="border rounded">

        <table class="w-full text-sm">

            <thead class="border-b bg-black text-white uppercase text-xs">

                <tr>

                    <th class="text-left px-4 py-3">
                        Internal Title
                    </th>

                    <th class="text-left px-4 py-3">
                        Email Subject
                    </th>

                    <th class="text-left px-4 py-3">
                        Category
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

                        <td class="px-4 py-3 font-medium">
                            {{ $resource->internal_title }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $resource->email_subject }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $resource->category->name }}
                        </td>

                        <td class="px-4 py-3 capitalize">
                            {{ $resource->status }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $resource->updated_at->format('M j, Y') }}
                        </td>

                        <td class="px-4 py-3 text-right">

                            <a href="{{ route('admin.teaching-library.resources.edit', $resource) }}"
                                class="inline-flex items-center px-3 py-1 text-xs bg-league text-white">
                                Edit
                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="px-4 py-8 text-center text-gray-500">
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