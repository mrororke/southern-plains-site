@extends('layouts.portal')

@section('title', 'View Resource')

@section('content')

<div class="max-w-7xl">

    {{-- HEADER --}}

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


    {{-- MAIN LAYOUT --}}

    <div class="grid grid-cols-12 gap-6">


        {{-- RESOURCE CONTENT --}}

        <div class="col-span-9">


            {{-- EMAIL SUBJECT --}}

            <div class="bg-white shadow p-6 mb-6">

                <h2 class="font-semibold mb-3">
                    Email Subject
                </h2>

                <p>
                    {{ $resource->email_subject }}
                </p>

            </div>



            {{-- BODY --}}

            <div class="bg-white shadow p-6">

                <h2 class="font-semibold mb-4">
                    Resource Content
                </h2>


                <div class="prose max-w-none">

                    {!! $resource->body !!}

                </div>

            </div>


        </div>



        {{-- RESOURCE DETAILS --}}

        <aside class="col-span-3">


            {{-- DETAILS --}}

            <div class="bg-white shadow p-4 mb-6">

                <h2 class="font-semibold mb-4">
                    Resource Details
                </h2>


                <div class="space-y-4">


                    <div>

                        <div class="text-xs uppercase text-gray-500">
                            Category
                        </div>

                        <div class="mt-1">
                            {{ $resource->category->name }}
                        </div>

                    </div>


                    <div>

                        <div class="text-xs uppercase text-gray-500">
                            Status
                        </div>

                        <div class="mt-1 capitalize">
                            {{ $resource->status }}
                        </div>

                    </div>


                    <div>

                        <div class="text-xs uppercase text-gray-500">
                            Template
                        </div>

                        <div class="mt-1">
                            {{ $resource->is_template ? 'Yes' : 'No' }}
                        </div>

                    </div>


                </div>

            </div>



            {{-- ORGANIZATION --}}

            <div class="bg-white shadow p-4 mb-6">


                <h2 class="font-semibold mb-4">
                    Organization
                </h2>


                <div class="space-y-4">


                    <div>

                        <div class="text-xs uppercase text-gray-500 mb-2">
                            Tags
                        </div>

                        @forelse($resource->tags as $tag)

                            <div>
                                {{ $tag->name }}
                            </div>

                        @empty

                            <div class="text-gray-400">
                                None
                            </div>

                        @endforelse

                    </div>



                    <div>

                        <div class="text-xs uppercase text-gray-500 mb-2">
                            Audiences
                        </div>


                        @forelse($resource->audiences as $audience)

                            <div>
                                {{ $audience->name }}
                            </div>

                        @empty

                            <div class="text-gray-400">
                                None
                            </div>

                        @endforelse

                    </div>



                    <div>

                        <div class="text-xs uppercase text-gray-500 mb-2">
                            Behaviors
                        </div>


                        @forelse($resource->tricks as $trick)

                            <div>
                                {{ $trick->name }}
                            </div>

                        @empty

                            <div class="text-gray-400">
                                None
                            </div>

                        @endforelse

                    </div>


                </div>


            </div>



            {{-- USAGE --}}

            <div class="bg-white shadow p-4 mb-6">

                <h2 class="font-semibold mb-4">
                    Usage
                </h2>


                <div>

                    <div class="text-xs uppercase text-gray-500">
                        Usage Count
                    </div>

                    <div class="mt-1">
                        {{ $resource->usage_count }}
                    </div>

                </div>


            </div>



            {{-- RELATED RESOURCES --}}

            <div class="bg-white shadow p-4 mb-6">

                <h2 class="font-semibold mb-4">
                    Related Resources
                </h2>


                <div class="text-gray-400">
                    Coming soon.
                </div>


            </div>



            {{-- REFERENCED BY --}}

            <div class="bg-white shadow p-4">

                <h2 class="font-semibold mb-4">
                    Referenced By
                </h2>


                <div class="text-gray-400">
                    Coming soon.
                </div>


            </div>



        </aside>


    </div>


</div>

@endsection