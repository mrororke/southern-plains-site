@vite('resources/js/admin/behavior-catalog/create.js')

@extends('admin.dashboard-v2.desktop')

@section('title', 'Create Behavior')

@section('content')

<div class="dashboard-content">

    {{-- Page header --}}
    <div class="mb-6 flex items-start justify-between gap-6">
        <div>
            
            <h1 class="font-sans text-6xl font-semibold text-sp-charcoal">
                Create Behavior
            </h1>

            <p class="mt-2 max-w-2xl text-sm text-sp-slate">
                Add the behavior details, assign categories, and include any
                helpful video resources.
            </p>
        </div>
    </div>

    {{-- Validation summary --}}
    @if($errors->any())
        <div
            class="mb-6 rounded-md border border-sp-burntClay
                   bg-sp-burntClay/10 px-5 py-4"
            role="alert"
        >
            <div class="flex items-start gap-3">
                <x-icons.circle-alert
                    class="mt-0.5 h-4 w-4 shrink-0 text-sp-burntClay"
                />

                <div>
                    <h2 class="font-semibold text-sp-charcoal">
                        Please review the form.
                    </h2>

                    <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-sp-slate">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <form
        method="POST"
        action="{{ route('admin-v2.behavior-catalog.store') }}"
        class="max-w-5xl"
    >
        @csrf

        {{-- Behavior details --}}
        <section
            class="mb-6 rounded-md border border-sp-warmStone
                   bg-sp-warmIvory p-6"
        >
            <div class="mb-6">
                <p
                    class="font-display text-sm uppercase tracking-wide
                           text-sp-burntClay"
                >
                    Behavior Details
                </p>

                <h2 class="mt-1 font-sans text-3xl font-semibold text-sp-charcoal">
                    Core Information
                </h2>
            </div>

            <div class="space-y-6">

                {{-- Name --}}
                <div>
                    <label
                        for="behavior-name"
                        class="mb-1 block text-xs font-semibold uppercase
                               tracking-wide text-sp-slate"
                    >
                        Name
                    </label>

                    <input
                        id="behavior-name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        autocomplete="off"
                        class="w-full rounded-md border border-sp-slate
                               bg-transparent placeholder:italic
                               placeholder:text-sp-slate
                               focus:border-sp-charcoal"
                    >

                    @error('name')
                        <p class="mt-1 text-sm text-sp-burntClay">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Categories --}}
                <fieldset>
                    <legend
                        class="mb-2 text-xs font-semibold uppercase
                               tracking-wide text-sp-slate"
                    >
                        Categories
                    </legend>

                    <div
                        class="grid gap-2 rounded-md border
                               border-sp-warmStone bg-white p-4
                               md:grid-cols-2 xl:grid-cols-3"
                    >
                        @foreach($levels as $level)
                            @php
                                $formattedLevel = ucwords(
                                    str_replace('_', ' ', $level->name)
                                );
                            @endphp

                            <label
                                class="flex cursor-pointer items-start gap-2
                                       rounded-md px-3 py-2 text-sm
                                       text-sp-charcoal transition-colors
                                       hover:bg-sp-limestone"
                            >
                                <input
                                    type="checkbox"
                                    name="levels[]"
                                    value="{{ $level->id }}"
                                    @checked(
                                        in_array(
                                            $level->id,
                                            old('levels', [])
                                        )
                                    )
                                    class="mt-0.5 rounded border-sp-slate
                                           text-sp-prairieGreen
                                           focus:ring-sp-prairieGreen"
                                >

                                <span>{{ $formattedLevel }}</span>
                            </label>
                        @endforeach
                    </div>

                    @error('levels')
                        <p class="mt-1 text-sm text-sp-burntClay">
                            {{ $message }}
                        </p>
                    @enderror

                    @error('levels.*')
                        <p class="mt-1 text-sm text-sp-burntClay">
                            {{ $message }}
                        </p>
                    @enderror
                </fieldset>

                {{-- Notes --}}
                <div>
                    <label
                        class="mb-1 block text-xs font-semibold uppercase
                               tracking-wide text-sp-slate"
                    >
                        Notes
                    </label>

                    <div
                        id="notes-editor"
                        data-value="{{ old('notes') }}"
                    ></div>

                    @error('notes')
                        <p class="mt-1 text-sm text-sp-burntClay">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

            </div>
        </section>

        {{-- Videos --}}
        <section
            class="rounded-md border border-sp-warmStone
                   bg-sp-warmIvory p-6"
        >
            <div
                class="mb-6 flex items-start justify-between gap-4
                       border-b border-sp-warmStone pb-4"
            >
                <div>
                    <p
                        class="font-display text-sm uppercase tracking-wide
                               text-sp-burntClay"
                    >
                        Resources
                    </p>

                    <h2
                        class="mt-1 font-sans text-3xl font-semibold
                               text-sp-charcoal"
                    >
                        Videos
                    </h2>

                    <p class="mt-1 text-sm text-sp-slate">
                        Add training videos and choose one preferred resource
                        when appropriate.
                    </p>
                </div>

                <button
                    id="add-video-btn"
                    type="button"
                    class="inline-flex shrink-0 items-center justify-center
                           gap-2 rounded-md bg-sp-prairieGreen px-4 py-2
                           text-sm font-semibold text-sp-warmIvory
                           transition-colors hover:bg-sp-prairieOchre"
                >
                    <x-icons.plus class="h-4 w-4" />

                    Add Video
                </button>
            </div>

            <div id="video-container" class="space-y-4">
                @foreach(old('videos', []) as $index => $video)
                    @include(
                        'admin.dashboard-v2.behavior-catalog.partials.video-row',
                        [
                            'index' => $index,
                            'url' => $video['url'] ?? '',
                            'currentPlatform' => $video['platform'] ?? 'unknown',
                            'creator' => $video['creator'] ?? '',
                            'isPreferred' => ! empty($video['is_preferred']),
                        ]
                    )
                @endforeach
            </div>

            <div
                id="video-empty-state"
                class="rounded-md bg-sp-limestone px-5 py-4
                       text-sm text-sp-slate"
            >
                No videos added yet. Select <strong>Add Video</strong> to
                include a resource.
            </div>

            @error('videos')
                <p class="mt-3 text-sm text-sp-burntClay">
                    {{ $message }}
                </p>
            @enderror

            @error('videos.*.url')
                <p class="mt-3 text-sm text-sp-burntClay">
                    {{ $message }}
                </p>
            @enderror
        </section>

        {{-- Form actions --}}
        <div
            class="mt-6 flex items-center justify-end gap-3
                   border-t border-sp-warmStone pt-6"
        >
            <a
                href="{{ route('admin-v2.behavior-catalog.index') }}"
                class="inline-flex items-center justify-center rounded-md
                       border border-sp-warmStone bg-sp-warmIvory
                       px-4 py-2 text-sm font-semibold text-sp-charcoal
                       transition-colors hover:bg-sp-limestone"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="inline-flex items-center justify-center gap-2
                       rounded-md bg-sp-prairieGreen px-4 py-2
                       text-sm font-semibold text-sp-warmIvory
                       transition-colors hover:bg-sp-prairieOchre"
            >
                <x-icons.check class="h-4 w-4" />

                Save Behavior
            </button>
        </div>

    </form>
</div>

@endsection