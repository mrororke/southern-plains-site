<div>

    <label class="text-sm font-semibold">
        Internal Title
    </label>

    <input
        name="internal_title"
        value="{{ old('internal_title') }}"
        class="mt-1 block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training"
        required>

    @error('internal_title')
        <p class="text-sm text-red-600 mt-1">
            {{ $message }}
        </p>
    @enderror

</div>


<div>

    <label class="text-sm font-semibold">
        Email Subject
    </label>

    <input
        name="email_subject"
        value="{{ old('email_subject') }}"
        class="mt-1 block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training"
        required>

    @error('email_subject')
        <p class="text-sm text-red-600 mt-1">
            {{ $message }}
        </p>
    @enderror

</div>


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

            <option value="{{ $category->id }}"
                @selected(old('resource_category_id') == $category->id)>

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


<div>

    <label class="text-sm font-semibold">
        Status
    </label>

    <select
        name="status"
        class="mt-1 block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training">

        <option value="draft" selected>
            Draft
        </option>

        <option value="published">
            Published
        </option>

        <option value="archived">
            Archived
        </option>

    </select>

</div>


<div>

    <label class="inline-flex items-center">

        <input
            type="checkbox"
            name="is_template"
            value="1"
            class="border-gray-300">

        <span class="ml-2 text-sm">
            Save as Template
        </span>

    </label>

</div>


<div>

    <label class="text-sm font-semibold">
        Body
    </label>

    <textarea
        name="body"
        rows="12"
        class="mt-1 block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training">{{ old('body') }}</textarea>

</div>