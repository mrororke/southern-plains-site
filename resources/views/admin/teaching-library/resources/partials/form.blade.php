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

function searchableCheckboxList(items, selected = [])
{
    return {

        search: '',

        items: items,

        selected: selected.map(String),


        filtered()
        {
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
                    data-value="{{ old('body', $resource->body) }}"
                ></div>


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
                                old(
                                    'resource_category_id',
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

        <div
            class="bg-white shadow p-4"
            x-data="searchableCheckboxList(
                @js(
                    $audiences->map(fn($audience) => [
                        'id' => $audience->id,
                        'name' => $audience->name
                    ])
                ),
                @js(
                    old(
                        'audiences',
                        $resource->audiences->pluck('id')->toArray()
                    )
                )
            )"
        >


            <h2 class="font-semibold mb-4">
                Audiences
            </h2>


            <input
                type="text"
                x-model="search"
                placeholder="Search audiences..."
                class="block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training mb-3">


            <div class="border p-3 max-h-48 overflow-y-auto space-y-2">


                <template x-for="item in filtered()" :key="item.id">


                    <label class="flex items-center">


                        <input
                            type="checkbox"
                            name="audiences[]"
                            :value="item.id"
                            x-model="selected"
                            class="border-gray-300">


                        <span class="ml-2 text-sm"
                            x-text="item.name">
                        </span>


                    </label>


                </template>


            </div>


        </div>






        {{-- BEHAVIORS --}}

        <div
            class="bg-white shadow p-4"
            x-data="searchableCheckboxList(
                @js(
                    $tricks->map(fn($trick) => [
                        'id' => $trick->id,
                        'name' => $trick->name
                    ])
                ),
                @js(
                    old(
                        'tricks',
                        $resource->tricks->pluck('id')->toArray()
                    )
                )
            )"
        >


            <h2 class="font-semibold mb-4">
                Related Behaviors
            </h2>


            <input
                type="text"
                x-model="search"
                placeholder="Search behaviors..."
                class="block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training mb-3">


            <div class="border p-3 max-h-[400] overflow-y-auto space-y-2">


                <template x-for="item in filtered()" :key="item.id">


                    <label class="flex items-center">


                        <input
                            type="checkbox"
                            name="tricks[]"
                            :value="item.id"
                            x-model="selected"
                            class="border-gray-300">


                        <span class="ml-2 text-sm"
                            x-text="item.name">
                        </span>


                    </label>


                </template>


            </div>


        </div>







        {{-- TAGS --}}

        <div
            class="bg-white shadow p-4"
            x-data="searchableCheckboxList(
                @js(
                    $tags->map(fn($tag) => [
                        'id' => $tag->id,
                        'name' => $tag->name
                    ])
                ),
                @js(
                    old(
                        'tags',
                        $resource->tags->pluck('id')->toArray()
                    )
                )
            )"
        >


            <h2 class="font-semibold mb-4">
                Tags
            </h2>


            <input
                type="text"
                x-model="search"
                placeholder="Search tags..."
                class="block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training mb-3">


            <div class="border p-3 max-h-48 overflow-y-auto space-y-2">


                <template x-for="item in filtered()" :key="item.id">


                    <label class="flex items-center">


                        <input
                            type="checkbox"
                            name="tags[]"
                            :value="item.id"
                            x-model="selected"
                            class="border-gray-300">


                        <span class="ml-2 text-sm"
                            x-text="item.name">
                        </span>


                    </label>


                </template>


            </div>


        </div>



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