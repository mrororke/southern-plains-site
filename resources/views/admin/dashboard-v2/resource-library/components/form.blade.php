<div class="space-y-8">

    {{-- Resource Details --}}
    {{-- Resource Details --}}
<section
    class="rounded-md border border-sp-warmStone
           bg-sp-warmIvory p-6"
>
    <h2
        class="font-sans text-lg font-semibold text-sp-charcoal"
    >
        Resource Details
    </h2>

    <p class="mt-1 text-sm text-sp-slate">
        Basic information about this Resource.
    </p>


    <div class="mt-6 space-y-6">

        {{-- Title --}}
        <div>
            <label
                for="title"
                class="block text-sm font-medium text-sp-charcoal"
            >
                Title
            </label>

            <input
                type="text"
                name="title"
                id="title"
                value="{{ old(
                    'title',
                    $resource->title ?? ''
                ) }}"
                class="mt-2 block w-full rounded-md
                       border-sp-warmStone
                       bg-sp-warmIvory
                       text-sm text-sp-charcoal
                       focus:border-sp-prairieGreen
                       focus:ring-sp-prairieGreen"
            >
        </div>


        <div class="grid grid-cols-2 gap-6">

            {{-- Category --}}
            <div>
                <label
                    for="resource_category_id"
                    class="block text-sm font-medium text-sp-charcoal"
                >
                    Category
                </label>

                <select
                    name="resource_category_id"
                    id="resource_category_id"
                    class="mt-2 block w-full rounded-md
                           border-sp-warmStone
                           bg-sp-warmIvory
                           text-sm text-sp-charcoal"
                >
                    <option value="">
                        Select Category
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            @selected(
                                old(
                                    'resource_category_id',
                                    $resource->resource_category_id ?? null
                                ) == $category->id
                            )
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>
            </div>


            {{-- Type --}}
            <div>
                <label
                    for="resource_type_id"
                    class="block text-sm font-medium text-sp-charcoal"
                >
                    Type
                </label>

                <select
                    name="resource_type_id"
                    id="resource_type_id"
                    class="mt-2 block w-full rounded-md
                           border-sp-warmStone
                           bg-sp-warmIvory
                           text-sm text-sp-charcoal"
                >
                    <option value="">
                        Select Type
                    </option>

                    @foreach($types as $type)

                        <option
                            value="{{ $type->id }}"
                            @selected(
                                old(
                                    'resource_type_id',
                                    $resource->resource_type_id ?? null
                                ) == $type->id
                            )
                        >
                            {{ $type->name }}
                        </option>

                    @endforeach

                </select>
            </div>

        </div>


        <div class="grid grid-cols-2 gap-6">

            {{-- Status --}}
            <div>
                <label
                    for="status"
                    class="block text-sm font-medium text-sp-charcoal"
                >
                    Status
                </label>

                <select
                    name="status"
                    id="status"
                    class="mt-2 block w-full rounded-md
                           border-sp-warmStone
                           bg-sp-warmIvory
                           text-sm text-sp-charcoal"
                >
                    <option
                        value="active"
                        @selected(
                            old(
                                'status',
                                $resource->status ?? 'active'
                            ) === 'active'
                        )
                    >
                        Active
                    </option>

                    <option
                        value="archived"
                        @selected(
                            old(
                                'status',
                                $resource->status ?? null
                            ) === 'archived'
                        )
                    >
                        Archived
                    </option>

                </select>
            </div>


            {{-- First Sent --}}
            <div>
                <label
                    for="first_sent"
                    class="block text-sm font-medium text-sp-charcoal"
                >
                    First Sent
                </label>

                <input
                    type="date"
                    name="first_sent"
                    id="first_sent"
                    value="{{ old(
                        'first_sent',
                        isset($resource)
                            ? optional($resource->first_sent)
                                ->format('Y-m-d')
                            : ''
                    ) }}"
                    class="mt-2 block w-full rounded-md
                           border-sp-warmStone
                           bg-sp-warmIvory
                           text-sm text-sp-charcoal"
                >
            </div>

        </div>

    </div>

</section>


    {{-- Content --}}
    <section
        class="rounded-md border border-sp-warmStone
               bg-sp-warmIvory p-6"
    >
        <h2
            class="font-sans text-lg font-semibold text-sp-charcoal"
        >
            Content
        </h2>

        <p class="mt-1 text-sm text-sp-slate">
            The Resource content will be edited here.
        </p>

    </section>


    {{-- Connections --}}
    <section
        class="rounded-md border border-sp-warmStone
               bg-sp-warmIvory p-6"
    >
        <h2
            class="font-sans text-lg font-semibold text-sp-charcoal"
        >
            Connections
        </h2>

        <p class="mt-1 text-sm text-sp-slate">
            Behaviors and related Resources will be managed here.
        </p>

    </section>


    {{-- Actions --}}
    <div class="flex justify-end gap-4">

        <a
            href="{{ route('admin-v2.resource-library.index') }}"
            class="inline-flex items-center justify-center
                   rounded-md border border-sp-warmStone
                   px-4 py-2 text-sm font-semibold
                   text-sp-charcoal hover:bg-sp-limestone/20"
        >
            Cancel
        </a>

        <button
            type="submit"
            class="inline-flex items-center justify-center
                   rounded-md bg-sp-prairieGreen px-4 py-2
                   text-sm font-semibold
                   text-sp-warmIvory hover:bg-sp-prairieOchre"
        >
            Save Resource
        </button>

    </div>

</div>