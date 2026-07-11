<div class="border p-4 space-y-4">

    <div>

        <label class="text-sm font-semibold">
            Name
        </label>

        <input
            name="name"
            value="{{ old('name', $category->name ?? '') }}"
            class="mt-1 block w-full border-gray-300 shadow-sm focus:border-training focus:ring-training"
            required>

    </div>

    <div>

        <label class="text-sm font-semibold">
            Description
        </label>

        <textarea
            name="description"
            rows="4"
            class="mt-1 block w-full border-gray-300 shadow-sm focus:border-trainingfocus:ring-training">{{ old('description', $category->description ?? '') }}</textarea>

    </div>

</div>

<div class="mt-6">

    <button
        class="inline-flex items-center px-2 py-1 text-xs uppercase transition ease-in-out duration-150 border-2 border-transparent bg-training hover:bg-training-hover text-white">

        Save Category

    </button>

</div>