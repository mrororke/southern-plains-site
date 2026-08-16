@props([
    'resources',
    'selected' => [],
    'name' => 'related_resources',
])

<div
    x-data="searchableCheckboxList(
        @js(
            $resources->map(fn ($resource) => [
                'id' => $resource->id,
                'name' => $resource->title,
                'meta' => trim(
                    $resource->type->name
                    . ' · '
                    . $resource->category->name
                ),
            ])
        ),
        @js(
            collect($selected)
                ->map(fn ($id) => (int) $id)
                ->values()
        )
    )"
    class="space-y-4"
>

    {{-- Hidden inputs submit every selected resource --}}
    <template
        x-for="id in selected"
        :key="`selected-resource-${id}`"
    >
        <input
            type="hidden"
            name="{{ $name }}[]"
            :value="id"
        >
    </template>

    <div>
        <label
            class="mb-2 block text-xs font-semibold uppercase
                   tracking-wide text-sp-slate"
        >
            Related Resources
        </label>

        <input
            x-model="search"
            type="text"
            placeholder="Search resources..."
            class="w-full rounded-md border border-sp-warmStone
                   bg-sp-warmIvory px-3 py-2 text-sm
                   focus:border-sp-prairieGreen focus:outline-none"
        >
    </div>

    <div
        class="grid max-h-72 gap-2 overflow-y-auto rounded-md
               border border-sp-warmStone
               bg-sp-warmIvory p-3"
    >

        <template
            x-for="item in filtered()"
            :key="item.id"
        >

            <label
                class="flex cursor-pointer items-start gap-3
                       rounded-md px-3 py-2
                       transition hover:bg-sp-limestone"
            >

                <input
                    type="checkbox"
                    :value="item.id"
                    :checked="selected.includes(item.id)"
                    x-model="selected"
                    class="mt-1 rounded border-sp-warmStone
                           text-sp-prairieGreen
                           focus:ring-sp-prairieGreen"
                >

                <span class="min-w-0">

                    <span
                        class="block text-sm text-sp-charcoal"
                        x-text="item.name"
                    ></span>

                    <span
                        class="block text-xs text-sp-slate"
                        x-text="item.meta"
                    ></span>

                </span>

            </label>

        </template>

    </div>

    <p class="text-xs text-sp-slate">

        <span x-text="selected.length"></span>

        selected

    </p>

</div>