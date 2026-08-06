@vite('resources/js/admin/behavior-catalog/edit.js')

@extends('admin.dashboard-v2.desktop')

@section('title', 'Edit Behavior')

@section('content')

<div class="dashboard-content">

    <x-admin.layout.page-header
        title="Edit Behavior"
        :description="'Update ' . $trick->name . ', manage categories, and maintain video resources.'"
    />

    <x-admin.forms.validation-summary />

    <form
        method="POST"
        action="{{ route('admin-v2.behavior-catalog.update', $trick) }}"
        class="w-full"
    >
        @csrf
        @method('PUT')

        {{-- Core Information --}}
        <x-admin.forms.section
            eyebrow="Behavior Details"
            title="Core Information"
        >
            <div class="space-y-6">

                {{-- Name --}}
                <div>

                    <label
                        for="behavior-name"
                        class="mb-1 block text-xs font-semibold uppercase tracking-wide text-sp-slate"
                    >
                        Name
                    </label>

                    <input
                        id="behavior-name"
                        type="text"
                        name="name"
                        value="{{ old('name', $trick->name) }}"
                        required
                        class="w-full rounded-md border border-sp-slate bg-transparent placeholder:italic placeholder:text-sp-slate focus:border-sp-charcoal"
                    >

                    <x-admin.forms.field-error name="name"/>

                </div>

                {{-- Categories --}}
                <x-admin.forms.category-selector
                    :levels="$levels"
                    :selected="old(
                        'levels',
                        $trick->levels->pluck('id')->toArray()
                    )"
                >
                    <x-admin.forms.field-error name="levels"/>
                    <x-admin.forms.field-error name="levels.*"/>
                </x-admin.forms.category-selector>

            </div>

        </x-admin.forms.section>

        {{-- Notes --}}
        <x-admin.forms.section
            eyebrow="Teaching Information"
            title="Notes"
            description="Update teaching instructions, reminders, prerequisites, or other useful context."
        >

            <x-admin.forms.rich-text
                id="notes-editor"
                name="notes"
                :value="old('notes', $trick->notes)"
            />

        </x-admin.forms.section>

        {{-- Videos --}}
        <x-admin.forms.section
            eyebrow="Resources"
            title="Videos"
            description="Manage training videos and choose one preferred resource."
            :header-border="true"
            class="mb-0"
        >

            <x-slot:actions>

                <button
                    id="add-video-btn"
                    type="button"
                    class="inline-flex items-center justify-center gap-2 rounded-md bg-sp-prairieGreen px-4 py-2 text-sm font-semibold text-sp-warmIvory transition-colors hover:bg-sp-prairieOchre"
                >

                    <x-icons.plus class="h-4 w-4"/>

                    Add Video

                </button>

            </x-slot:actions>

            <div id="video-container" class="space-y-4">

                @foreach($trick->videos as $index => $video)

                    @include(
                        'admin.dashboard.partials.video-row',
                        [
                            'index' => $index,
                            'videoId' => $video->id,
                            'url' => $video->url,
                            'currentPlatform' => $video->platform,
                            'creator' => $video->creator,
                            'isPreferred' => $video->is_preferred,
                        ]
                    )

                @endforeach

            </div>

            <div
                id="video-empty-state"
                class="rounded-md bg-sp-limestone px-5 py-4 text-sm text-sp-slate"
            >
                No videos added yet. Select
                <strong>Add Video</strong>
                to include a resource.
            </div>

            <x-admin.forms.field-error
                name="videos"
                class="mt-3"
            />

            <x-admin.forms.field-error
                name="videos.*.url"
                class="mt-3"
            />

        </x-admin.forms.section>

        {{-- Actions --}}
        <div
            class="mt-6 flex items-center justify-between border-t border-sp-warmStone pt-6"
        >

            <button
                type="button"
                onclick="confirmDeleteBehavior()"
                class="inline-flex items-center justify-center rounded-md border border-sp-clayRed px-4 py-2 text-sm font-semibold text-sp-warmIvory transition-colors hover:bg-red-600 hover:text-white"
            >
                <x-icons.trash-2 class="mr-2 h-4 w-4"/>

                Delete Behavior
            </button>

            <x-admin.forms.actions
                :cancel-href="route('admin-v2.behavior-catalog.index')"
                submit-label="Update Behavior"
            />

        </div>

    </form>

</div>

<form
    id="delete-form"
    method="POST"
    action="{{ route('admin-v2.behavior-catalog.destroy', $trick) }}"
    class="hidden"
>
    @csrf
    @method('DELETE')
</form>

@endsection