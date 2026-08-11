<button
    type="button"
    @click="selectResource({
        id: {{ $resource->id }},
        title: @js($resource->title),
        body: @js($resource->body),
        type: @js($resource->type->name),
        category: @js($resource->category->name),
        status: @js($resource->status),
        edit_url: @js(
            route(
                'admin-v2.resource-library.edit',
                $resource
            )
        )
    })"
    :aria-pressed="
        selectedResource?.id === {{ $resource->id }}
            ? 'true'
            : 'false'
    "
    :class="{
        'border-sp-prairieBlue bg-sp-limestone/30':
            selectedResource?.id === {{ $resource->id }}
    }"
    class="group block w-full border-l-4 border-transparent
           px-4 py-4 text-left transition-colors
           hover:border-sp-warmStone hover:bg-sp-limestone/40"
>