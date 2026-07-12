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

        <label class="text-sm font-semibold">
            Body
        </label>


        <textarea
            name="body"
            rows="12"
            class="mt-1 block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training">{{ old('body', $resource->body) }}</textarea>


        @error('body')

            <p class="text-sm text-red-600 mt-1">
                {{ $message }}
            </p>

        @enderror


    </div>


</div>