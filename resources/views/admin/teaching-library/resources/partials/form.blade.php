@if ($errors->any())

<div class="border p-4 mb-6 text-sm">

    <div class="font-semibold mb-2">
        Please correct the following errors:
    </div>

    <ul class="list-disc pl-5">

        @foreach ($errors->all() as $error)

        <li>
            {{ $error }}
        </li>

        @endforeach

    </ul>

</div>

@endif


@push('scripts')

<script>
    function searchableCheckboxList(items, selected = []) {
        return {

            search: '',

            items: items,

            selected: selected.map(String),


            filtered() {
                if (!this.search) {

                    return this.items;

                }


                return this.items.filter(item =>

                    item.name
                    .toLowerCase()
                    .includes(
                        this.search.toLowerCase()
                    )

                );

            }

        }
    }
</script>

@endpush



<div class="grid grid-cols-12 gap-6 items-start">


    {{-- =========================================================
        MAIN CONTENT
    ========================================================== --}}

    <div class="col-span-7">


        <div class="bg-white shadow p-6 space-y-6">


            {{-- INTERNAL TITLE --}}

            <div>

                <label class="text-sm font-semibold">
                    Internal Title
                </label>


                <input
                    type="text"
                    name="internal_title"
                    value="{{ old('internal_title', $resource->internal_title) }}"
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training"
                    required>


                @error('internal_title')

                <p class="text-sm text-red-600 mt-1">
                    {{ $message }}
                </p>

                @enderror

            </div>



            {{-- EMAIL SUBJECT --}}

            <div>

                <label class="text-sm font-semibold">
                    Email Subject
                </label>


                <input
                    type="text"
                    name="email_subject"
                    value="{{ old('email_subject', $resource->email_subject) }}"
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training"
                    required>


                @error('email_subject')

                <p class="text-sm text-red-600 mt-1">
                    {{ $message }}
                </p>

                @enderror

            </div>




            {{-- BODY --}}

            <div>

                <div
                    id="body-editor"
                    data-value="{{ old('body', $resource->body) }}"></div>


                @error('body')

                <p class="text-sm text-red-600 mt-1">
                    {{ $message }}
                </p>

                @enderror

            </div>


        </div>


    </div>





    {{-- =========================================================
        SIDEBAR
    ========================================================== --}}

    <div class="col-span-5 space-y-6">



        {{-- RESOURCE DETAILS --}}

        <div class="bg-white shadow p-4">


            <h2 class="font-semibold mb-4">
                Resource Details
            </h2>



            {{-- CATEGORY --}}

            <div class="mb-5">

                <label class="text-sm font-semibold">
                    Category
                </label>


                <select
                    name="resource_category_id"
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training"
                    required>


                    <option value="">
                        Select Category
                    </option>


                    @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        @selected(
                        old( 'resource_category_id' ,
                        $resource->resource_category_id
                        ) == $category->id
                        )>

                        {{ $category->name }}

                    </option>

                    @endforeach


                </select>


            </div>




            {{-- STATUS --}}

            <div class="mb-5">

                <label class="text-sm font-semibold">
                    Status
                </label>


                <select
                    name="status"
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training">


                    <option value="draft"
                        @selected(old('status', $resource->status ?? 'draft') === 'draft')>

                        Draft

                    </option>


                    <option value="published"
                        @selected(old('status', $resource->status) === 'published')>

                        Published

                    </option>


                    <option value="archived"
                        @selected(old('status', $resource->status) === 'archived')>

                        Archived

                    </option>


                </select>

            </div>



            {{-- TEMPLATE --}}

            <label class="inline-flex items-center">


                <input
                    type="checkbox"
                    name="is_template"
                    value="1"
                    class="border-gray-300"
                    @checked(old('is_template', $resource->is_template))>


                <span class="ml-2 text-sm">
                    Save as Template
                </span>


            </label>


        </div>






        {{-- AUDIENCES --}}

        <x-portal.searchable-checkbox-list
    title="Audiences"
    search-placeholder="Search audiences..."
    name="audiences"
    :items="$audiences"
    :selected="old(
        'audiences',
        $resource->audiences->pluck('id')->toArray()
    )"
/>






        {{-- BEHAVIORS --}}

        <x-portal.searchable-checkbox-list
    title="Related Behaviors"
    search-placeholder="Search behaviors..."
    name="tricks"
    :items="$tricks"
    :selected="old(
        'tricks',
        $resource->tricks->pluck('id')->toArray()
    )"
/>



        {{-- BEHAVIOR PREVIEW --}}

        <div
            class="bg-white shadow p-4"
            x-data="behaviorPreview()">

            <h2 class="font-semibold mb-4">
                Behavior Preview
                <span
        class="text-sm font-normal text-gray-500"
        x-text="'(' + behaviors.length + ')'">
    </span>
            </h2>


            <div x-show="loading" class="text-sm text-gray-500">
                Loading behaviors...
            </div>


            <div
                x-show="!loading && behaviors.length === 0"
                class="text-sm text-gray-500">

                Select behaviors above to preview them here.

            </div>


            <div
                x-show="!loading && behaviors.length > 0"
                class="space-y-4">


                <template x-for="behavior in behaviors" :key="behavior.id">

                    <div class="border bg-gray-50 p-4">


                        {{-- HEADER --}}

                        <div class="flex justify-between items-start">

                            <div>

                                <h3
                                    class="font-semibold"
                                    x-text="behavior.name">
                                </h3>

                                <div
                                    class="text-sm text-gray-600 mt-1"
                                    x-text="
                'Level: ' +
                behavior.levels
                    .map(level => formatLevel(level.name))
                    .join(', ')
            ">
                                </div>

                            </div>

                            <button
                                type="button"
                                @click="copyGroupedEmail(behavior, $event.currentTarget)"
                                class="inline-flex items-center px-2 py-1 text-xs uppercase bg-training text-white">

                                <span class="copy-label">
                                    Copy For Email
                                </span>

                            </button>

                        </div>


                        {{-- NOTES --}}

                        <div
                            x-data="{ open: false }"
                            class="mt-4">


                            <button
                                type="button"
                                @click="open = !open"
                                class="text-xs uppercase text-training">

                                <span x-text="open ? 'Hide Notes' : 'Show Notes'"></span>

                            </button>


                            <div
                                x-show="open"
                                x-transition
                                class="mt-2 text-sm border-t pt-3"
                                x-html="behavior.notes || 'No notes available.'">

                            </div>


                        </div>


                    </div>


                </template>


            </div>

        </div>



        {{-- TAGS --}}

        <x-portal.searchable-checkbox-list
    title="Tags"
    search-placeholder="Search tags..."
    name="tags"
    :items="$tags"
    :selected="old(
        'tags',
        $resource->tags->pluck('id')->toArray()
    )"
/>



    </div>


</div>





{{-- SUBMIT BUTTON --}}

<div class="mt-6">

    <button
        type="submit"
        class="inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-training hover:bg-training-hover text-white">


        {{ $resource->exists ? 'Update Resource' : 'Save Resource' }}


    </button>


</div>