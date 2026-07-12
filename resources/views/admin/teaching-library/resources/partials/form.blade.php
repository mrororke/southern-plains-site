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


<div class="space-y-6">


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



    {{-- CATEGORY --}}

    <div>

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


        @error('resource_category_id')

            <p class="text-sm text-red-600 mt-1">
                {{ $message }}
            </p>

        @enderror

    </div>

    {{-- TAGS --}}

<div>

    <label class="text-sm font-semibold">
        Tags
    </label>

    <select
        name="tags[]"
        multiple
        class="mt-1 block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training">

        @foreach($tags as $tag)

            <option
                value="{{ $tag->id }}"
                @selected(
                    in_array(
                        $tag->id,
                        old(
                            'tags',
                            $resource->tags->pluck('id')->toArray()
                        )
                    )
                )>

                {{ $tag->name }}

            </option>

        @endforeach

    </select>

    <p class="text-xs text-gray-500 mt-1">
        Hold CTRL/CMD to select multiple tags.
    </p>

    @error('tags')

        <p class="text-sm text-red-600 mt-1">
            {{ $message }}
        </p>

    @enderror

</div>

{{-- AUDIENCES --}}

<div>

    <label class="text-sm font-semibold">
        Audiences
    </label>

    <select
        name="audiences[]"
        multiple
        class="mt-1 block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training">

        @foreach($audiences as $audience)

            <option
                value="{{ $audience->id }}"
                @selected(
                    in_array(
                        $audience->id,
                        old(
                            'audiences',
                            $resource->audiences->pluck('id')->toArray()
                        )
                    )
                )>

                {{ $audience->name }}

            </option>

        @endforeach

    </select>

    <p class="text-xs text-gray-500 mt-1">
        Hold CTRL/CMD to select multiple audiences.
    </p>

    @error('audiences')

        <p class="text-sm text-red-600 mt-1">
            {{ $message }}
        </p>

    @enderror

</div>

{{-- BEHAVIORS --}}

<div>

    <label class="text-sm font-semibold">
        Related Behaviors
    </label>

    <select
        name="tricks[]"
        multiple
        class="mt-1 block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training">

        @foreach($tricks as $trick)

            <option
                value="{{ $trick->id }}"
                @selected(
                    in_array(
                        $trick->id,
                        old(
                            'tricks',
                            $resource->tricks->pluck('id')->toArray()
                        )
                    )
                )>

                {{ $trick->name }}

            </option>

        @endforeach

    </select>

    <p class="text-xs text-gray-500 mt-1">
        Hold CTRL/CMD to select multiple behaviors.
    </p>

    @error('tricks')
        <p class="text-sm text-red-600 mt-1">
            {{ $message }}
        </p>
    @enderror

</div>




    {{-- STATUS --}}

    <div>

        <label class="text-sm font-semibold">
            Status
        </label>

        <select
            name="status"
            class="mt-1 block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training">


            <option
                value="draft"
                @selected(old('status', $resource->status ?? 'draft') === 'draft')>

                Draft

            </option>


            <option
                value="published"
                @selected(old('status', $resource->status) === 'published')>

                Published

            </option>


            <option
                value="archived"
                @selected(old('status', $resource->status) === 'archived')>

                Archived

            </option>


        </select>


        @error('status')

            <p class="text-sm text-red-600 mt-1">
                {{ $message }}
            </p>

        @enderror

    </div>




    {{-- TEMPLATE FLAG --}}

    <div>

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


    {{-- SUBMIT BUTTON --}}

    <div class="pt-4">

        <button
            type="submit"
            class="inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-training hover:bg-training-hover text-white">

            {{ $resource->exists ? 'Update Resource' : 'Save Resource' }}

        </button>

    </div>


</div>