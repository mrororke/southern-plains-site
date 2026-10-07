@props([
    'label',
    'name',
    'items',
    'selected' => [],
    'searchPlaceholder' => 'Search...',
    'emptyMessage' => 'No items available.',
])

<div
    x-data="searchableCheckboxList(
        @js(
            collect($items)->map(fn ($item) => [
                'id' => (string) $item->id,
                'name' => $item->name,
            ])->values()
        ),
        @js(
            collect($selected)
                ->map(fn ($id) => (string) $id)
                ->values()
        )
    )"
    class="space-y-4"
>
    <div>
        <label
            class="mb-2 block text-xs font-semibold uppercase
                   tracking-wide text-sp-slate"
        >
            {{ $label }}
        </label>

        @if (collect($items)->isNotEmpty())
            <input
                x-model="search"
                type="text"
                placeholder="{{ $searchPlaceholder }}"
                autocomplete="off"
                class="w-full rounded-md border border-sp-warmStone
                       bg-sp-warmIvory px-3 py-2 text-sm
                       text-sp-charcoal
                       focus:border-sp-prairieGreen
                       focus:outline-none"
            >
        @endif
    </div>

    @if (collect($items)->isNotEmpty())
        <div
            class="grid max-h-72 grid-cols-2 gap-2 overflow-y-auto
                   rounded-md border border-sp-warmStone
                   bg-sp-warmIvory p-3 lg:grid-cols-3"
        >
            <template
                x-for="item in filtered()"
                :key="item.id"
            >
                <label
                    class="flex cursor-pointer items-center gap-2
                           rounded-md px-2 py-1 transition
                           hover:bg-sp-limestone"
                >
                    <input
                        type="checkbox"
                        :value="item.id"
                        x-model="selected"
                        :name="'{{ $name }}[]'"
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

            <p
                x-show="filtered().length === 0"
                x-cloak
                class="col-span-full px-2 py-1
                       text-sm text-sp-slate"
            >
                No matches found.
            </p>
        </div>

        <p class="text-xs text-sp-slate">
            <span x-text="selected.length"></span>
            selected
        </p>
    @else
        <div
            class="rounded-md border border-dashed
                   border-sp-warmStone bg-sp-warmIvory
                   px-4 py-4"
        >
            <p class="text-sm text-sp-slate">
                {{ $emptyMessage }}
            </p>
        </div>
    @endif

    {{ $slot }}
</div>