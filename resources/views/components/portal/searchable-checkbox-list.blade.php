@props([
    'title',
    'name',
    'items',
    'selected' => [],
    'searchPlaceholder' => 'Search...',
])


<div
    class="bg-white shadow p-4"
    x-data="searchableCheckboxList(
        @js(
            collect($items)->map(fn($item) => [
                'id' => (string) $item->id,
                'name' => $item->name,
            ])
        ),
        @js(
            collect($selected)
                ->map(fn($id) => (string) $id)
                ->values()
        )
    )">


    <h2 class="font-semibold mb-4">
        {{ $title }}
    </h2>


    <input
        type="text"
        x-model="search"
        placeholder="{{ $searchPlaceholder }}"
        class="block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training mb-3">


    <div class="text-xs text-gray-500 mb-2">

        <span x-text="filtered().length"></span>

        found

    </div>


    <div class="border p-3 max-h-80 overflow-y-auto space-y-2">


        <template
            x-for="item in filtered()"
            :key="item.id">


            <label class="flex items-center">


                <input
                    type="checkbox"
                    :name="'{{ $name }}[]'"
                    :value="item.id"
                    x-model="selected"
                    class="border-gray-300">


                <span
                    class="ml-2 text-sm"
                    x-text="item.name">
                </span>


            </label>


        </template>


    </div>


</div>