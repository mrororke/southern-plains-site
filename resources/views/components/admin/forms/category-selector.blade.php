@props([
    'levels',
    'selected' => [],
    'label' => 'Categories',
    'name' => 'levels',
])

<div
    x-data="searchableCheckboxList(
        @js(
            $levels->map(fn ($level) => [
                'id' => $level->id,
                'name' => ucwords(str_replace('_', ' ', $level->name)),
            ])
        ),
        @js(collect($selected)->map(fn ($id) => (int) $id)->values())
    )"
    class="space-y-4"
>

    <div>
        <label
            class="mb-2 block text-xs font-semibold uppercase tracking-wide text-sp-slate"
        >
            {{ $label }}
        </label>

        <input
            x-model="search"
            type="text"
            placeholder="Search categories..."
            class="w-full rounded-md border border-sp-warmStone bg-sp-warmIvory
                   px-3 py-2 text-sm
                   focus:border-sp-prairieGreen focus:outline-none"
        >
    </div>

    <div
        class="grid max-h-72 grid-cols-2 gap-2 overflow-y-auto rounded-md
               border border-sp-warmStone bg-sp-warmIvory p-3 lg:grid-cols-3"
    >

        <template
            x-for="item in filtered()"
            :key="item.id"
        >

            <label
                class="flex cursor-pointer items-center gap-2 rounded-md
                       px-2 py-1 transition hover:bg-sp-limestone"
            >

                <input
                    type="checkbox"
                    :value="item.id"
                    x-model="selected"
                    name="levels[]"
                    class="rounded border-sp-warmStone
                           text-sp-prairieGreen
                           focus:ring-sp-prairieGreen"
                >

                <span
                    class="text-sm text-sp-charcoal"
                    x-text="item.name"
                ></span>

            </label>

        </template>

    </div>

    <p class="text-xs text-sp-slate">

        <span x-text="selected.length"></span>

        selected

    </p>

</div>