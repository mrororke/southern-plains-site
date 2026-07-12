@extends('layouts.portal')

@section('title', 'View Resource')

@section('content')

<div class="max-w-5xl">

    <div class="flex justify-between items-center mb-6">

        <div>

            <h1 class="font-heading text-4xl pb-2">
                {{ $resource->internal_title }}
            </h1>

            <p class="text-sm text-gray-600 mt-1">
                Teaching Library Resource
            </p>

        </div>

        <a
            href="{{ route('admin.teaching-library.resources.edit', $resource) }}"
            class="inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-league text-white">

            Edit Resource

        </a>

    </div>
    <div class="bg-white shadow p-6 mb-6">

    <dl class="grid grid-cols-2 gap-6">

        <div>
            <dt class="text-xs uppercase text-gray-500">
                Email Subject
            </dt>

            <dd class="mt-1">
                {{ $resource->email_subject }}
            </dd>
        </div>

        <div>
            <dt class="text-xs uppercase text-gray-500">
                Category
            </dt>

            <dd class="mt-1">
                {{ $resource->category->name }}
            </dd>
        </div>

        <div>
            <dt class="text-xs uppercase text-gray-500">
                Status
            </dt>

            <dd class="mt-1 capitalize">
                {{ $resource->status }}
            </dd>
        </div>

        <div>
            <dt class="text-xs uppercase text-gray-500">
                Template
            </dt>

            <dd class="mt-1">
                {{ $resource->is_template ? 'Yes' : 'No' }}
            </dd>
        </div>

        <div>
            <dt class="text-xs uppercase text-gray-500">
                Author
            </dt>

            <dd class="mt-1">
                {{ $resource->author?->name }}
            </dd>
        </div>

        <div>
            <dt class="text-xs uppercase text-gray-500">
                Last Updated By
            </dt>

            <dd class="mt-1">
                {{ $resource->updatedBy?->name }}
            </dd>
        </div>

        <div>
            <dt class="text-xs uppercase text-gray-500">
                Created
            </dt>

            <dd class="mt-1">
                {{ $resource->created_at->format('M j, Y g:i A') }}
            </dd>
        </div>

        <div>
            <dt class="text-xs uppercase text-gray-500">
                Updated
            </dt>

            <dd class="mt-1">
                {{ $resource->updated_at->format('M j, Y g:i A') }}
            </dd>
        </div>

    </dl>

</div>
<div class="bg-white shadow p-6 mb-6">

    <h2 class="font-semibold mb-4">
        Organization
    </h2>

    <div class="space-y-5">

        <div>

            <div class="text-xs uppercase text-gray-500 mb-2">
                Tags
            </div>

            @forelse($resource->tags as $tag)

                <div>{{ $tag->name }}</div>

            @empty

                <div class="text-gray-500">
                    None
                </div>

            @endforelse

        </div>

        <div>

            <div class="text-xs uppercase text-gray-500 mb-2">
                Audiences
            </div>

            @forelse($resource->audiences as $audience)

                <div>{{ $audience->name }}</div>

            @empty

                <div class="text-gray-500">
                    None
                </div>

            @endforelse

        </div>

        <div>

            <div class="text-xs uppercase text-gray-500 mb-2">
                Related Behaviors
            </div>

            @forelse($resource->tricks as $trick)

                <div>{{ $trick->name }}</div>

            @empty

                <div class="text-gray-500">
                    None
                </div>

            @endforelse

        </div>

    </div>

</div>
<div class="bg-white shadow p-6">

    <h2 class="font-semibold mb-4">
        Resource Content
    </h2>

    <div class="prose max-w-none">

        {!! $resource->body !!}

    </div>

</div>

</div>

@endsection