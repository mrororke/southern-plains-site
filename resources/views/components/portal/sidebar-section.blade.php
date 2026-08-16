@props([
    'title'
])

<details class="group" style="margin: 0 !important;">

    <summary class="block cursor-pointer hover:bg-gray-500">

        <div
            class="flex items-center uppercase text-sm hover:bg-gray-700 border-b border-white"
            style="padding: 10px 0 10px 10px;"
        >
            <span class="py-2.5 px-4">
                {{ $title }}
            </span>
        </div>

    </summary>

    <ul>
        {{ $slot }}
    </ul>

</details>