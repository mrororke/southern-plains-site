@extends('layouts.base-training')

@section('page_content')
<div class="mx-auto max-w-4xl pt-10 pb-10">
    <div class="flex flex-col lg:flex-row gap-10">
        <div class="w-full lg:w-3/4 px-4">
            <h4 class="uppercase text-xs font-bold">Certifications</h4>
            <h1 class="font-heading text-7xl">Trick Dog<br />Application.</h1>
            <p class="text-base mb-2">Ready to show off what you've learned? Select your level and submission method below. We'll review your performance and issue your official title certificate.</p>
        </div>
    </div>

    <div class="container mx-auto px-4 max-w-4xl">
        <!-- Validation Errors -->
        @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
            <p class="font-bold">Please correct the following errors:</p>
            <ul class="list-disc ml-5 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form -->
        <form action="{{ route('emails.trickevaluation.store') }}" method="POST" id="trickDogForm" class="space-y-8 py-8">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Owner Info -->
                <div>
                    <label for="owner_name" class="block text-sm font-semibold text-gray-700">Owner Name <span class="text-red-500">*</span></label>
                    <input type="text" name="owner_name" id="owner_name" value="{{ old('owner_name') }}" required
                        class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12 px-3">
                </div>

                <div>
                    <label for="dog_name" class="block text-sm font-semibold text-gray-700">Dog's Name <span class="text-red-500">*</span></label>
                    <input type="text" name="dog_name" id="dog_name" value="{{ old('dog_name') }}" required
                        class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12 px-3">
                </div>

                <!-- Level Selection -->
                <div class="col-span-2">
                    <label for="trick_level" class="block text-sm font-semibold text-gray-700">Title Level Seeking <span class="text-red-500">*</span></label>
                    <select name="trick_level" id="trick_level" required
                        class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12 px-3 bg-white">
                        <option value="">-- Select a Level --</option>
                        <option value="Novice" {{ old('trick_level') == 'Novice' ? 'selected' : '' }}>Novice</option>
                        <option value="Intermediate" {{ old('trick_level') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                        <option value="Advanced" {{ old('trick_level') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                        <option value="Performer" {{ old('trick_level') == 'Performer' ? 'selected' : '' }}>Performer</option>
                        <option value="Elite Performer" {{ old('trick_level') == 'Elite Performer' ? 'selected' : '' }}>Elite Performer</option>
                    </select>
                </div>

                <!-- DYNAMIC: Prerequisite Field (Hidden by default) -->
                <div id="prereq_container" class="col-span-2 hidden bg-amber-50 border-l-4 border-amber-400 p-4 transition-all">
                    <label for="prereq_title" class="block text-sm font-semibold text-amber-900">Advanced Title Certificate # <span class="text-red-500">*</span></label>
                    <p class="text-xs text-amber-700 mb-2 font-medium">Performer levels require a verified Advanced Title on file.</p>
                    <input type="text" name="prereq_title" id="prereq_title" placeholder="e.g., TD-ADV-12345"
                        class="block w-full border-amber-300 focus:border-amber-500 focus:ring-amber-500 h-12 px-3">
                </div>

                <!-- Evaluation Method -->
                <div class="col-span-2 py-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-4">How should we evaluate the tricks? <span class="text-red-500">*</span></label>
                    <div class="flex flex-row gap-12">
                        <label class="inline-flex items-center cursor-pointer group">
                            <input type="radio" name="eval_method" value="online" onclick="toggleEvalFields('online')" {{ old('eval_method') == 'online' ? 'checked' : '' }} required class="w-5 h-5 text-training border-gray-300 focus:ring-training">
                            <span class="ml-3 text-sm text-gray-600 group-hover:text-training transition-colors font-medium">Video Submission</span>
                        </label>
                        <label class="inline-flex items-center cursor-pointer group">
                            <input type="radio" name="eval_method" value="in-person" onclick="toggleEvalFields('in-person')" {{ old('eval_method') == 'in-person' ? 'checked' : '' }} class="w-5 h-5 text-training border-gray-300 focus:ring-training">
                            <span class="ml-3 text-sm text-gray-600 group-hover:text-training transition-colors font-medium">In-Person Evaluation</span>
                        </label>
                    </div>
                </div>

                <!-- DYNAMIC: Video Field -->
                <div id="video_container" class="col-span-2 hidden">
                    <label for="video_link" class="block text-sm font-semibold text-gray-700">Video Link (YouTube/Vimeo) <span class="text-red-500">*</span></label>
                    <input type="url" name="video_link" id="video_link" placeholder="https://www.youtube.com/watch?v=..."
                        class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12 px-3">
                </div>

                <!-- DYNAMIC: Location Selection -->
                <div id="location_container" class="col-span-2 hidden">
                    <label for="location" class="block text-sm font-semibold text-gray-700">Preferred Evaluation Center <span class="text-red-500">*</span></label>
                    <select name="location" id="location" class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12 px-3 bg-white">
                        <option value="">-- Choose a Location --</option>
                        <option value="Main Street">Main Street Training Hub</option>
                        <option value="Rogers County">Rogers County Annex</option>
                    </select>
                </div>

                <!-- Multi-dog Logic -->
                <div class="col-span-2 pt-4 border-t border-gray-100">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="multi_dog_trigger" class="w-5 h-5 text-training border-gray-300 focus:ring-training rounded">
                        <span class="ml-3 text-sm font-semibold text-gray-700">Submit for additional dogs?</span>
                    </label>

                    <div id="multi_dog_count_container" class="hidden mt-4 bg-gray-50 p-4 border border-gray-200">
                        <label for="additional_dogs" class="block text-sm font-semibold text-gray-700 mb-2">How many additional dogs? ($15 per extra dog)</label>
                        <input type="number" name="additional_dogs" id="additional_dogs" value="0" min="0" max="10"
                            class="block w-24 border-gray-300 focus:border-training focus:ring-training h-12 px-3">
                    </div>
                </div>
            </div>

            <!-- Footer / Pricing Display -->
            <div class="pt-8 border-t border-gray-200 mt-10">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-8">
                    <div class="text-center sm:text-left">
                        <p class="text-sm uppercase tracking-widest text-gray-400 font-bold">Total Application Fee</p>
                        <p id="fee_display" class="text-5xl font-heading text-training font-bold">$25</p>
                    </div>
                    <button type="submit" class="w-full sm:w-auto px-12 py-5 bg-training text-white uppercase text-sm font-bold tracking-widest hover:bg-training/90 transition shadow-xl">
                        Submit Application
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const levelSelect = document.getElementById('trick_level');
        const prereqDiv = document.getElementById('prereq_container');
        const prereqInput = document.getElementById('prereq_title');
        
        const videoDiv = document.getElementById('video_container');
        const videoInput = document.getElementById('video_link');
        const locationDiv = document.getElementById('location_container');
        const locationSelect = document.getElementById('location');

        const multiCheck = document.getElementById('multi_dog_trigger');
        const multiCountDiv = document.getElementById('multi_dog_count_container');
        const additionalDogsInput = document.getElementById('additional_dogs');
        const feeDisplay = document.getElementById('fee_display');

        // Toggle Prerequisite Field
        levelSelect.addEventListener('change', function() {
            const highLevels = ['Performer', 'Elite Performer'];
            if (highLevels.includes(this.value)) {
                prereqDiv.classList.remove('hidden');
                prereqInput.required = true;
            } else {
                prereqDiv.classList.add('hidden');
                prereqInput.required = false;
            }
        });

        // Toggle Video vs Location
        window.toggleEvalFields = function(method) {
            if (method === 'online') {
                videoDiv.classList.remove('hidden');
                videoInput.required = true;
                locationDiv.classList.add('hidden');
                locationSelect.required = false;
            } else {
                videoDiv.classList.add('hidden');
                videoInput.required = false;
                locationDiv.classList.remove('hidden');
                locationSelect.required = true;
            }
        };

        // Multi-dog price calculation
        function calculateFee() {
            const base = 25;
            const extraCount = parseInt(additionalDogsInput.value) || 0;
            const total = base + (extraCount * 15);
            feeDisplay.innerText = '$' + total;
        }

        multiCheck.addEventListener('change', function() {
            if (this.checked) {
                multiCountDiv.classList.remove('hidden');
            } else {
                multiCountDiv.classList.add('hidden');
                additionalDogsInput.value = 0;
                calculateFee();
            }
        });

        additionalDogsInput.addEventListener('input', calculateFee);
        
        // Handle Laravel 'old' values on page load
        if (levelSelect.value) levelSelect.dispatchEvent(new Event('change'));
        if (multiCheck.checked) multiCountDiv.classList.remove('hidden');
        calculateFee();
    });
</script>
@endsection