@extends('layouts.base-training')

@section('page_content')
<div class="mx-auto max-w-4xl pt-10 pb-10">
    <div class="flex flex-col lg:flex-row gap-10">
        <div class="w-full lg:w-3/4 px-4">
            <h4 class="uppercase text-xs font-bold tracking-widest text-training">Certifications</h4>
            <h1 class="font-heading text-7xl">Trick Dog<br />Application.</h1>
            <p class="text-base mb-2">Ready to show off what your dogs have learned? Select the level and submission method for each dog below. We'll review the performances and issue official certificates.</p>
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
                <div class="col-span-2 md:col-span-1">
                    <label for="owner_name" class="block text-sm font-semibold text-gray-700">Owner Name <span class="text-red-500">*</span></label>
                    <input type="text" name="owner_name" id="owner_name" value="{{ old('owner_name') }}" required
                        class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12 px-3">
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label for="email" class="block text-sm font-semibold text-gray-700">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12 px-3">
                </div>

                <!-- Primary Dog Info Section -->
                <div class="col-span-2 p-6 bg-gray-50 border border-gray-200 rounded-lg">
                    <p class="text-xs font-bold text-training uppercase tracking-widest mb-4">Primary Dog</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="dog_name" class="block text-sm font-semibold text-gray-700">Dog's Name <span class="text-red-500">*</span></label>
                            <input type="text" name="dog_name" id="dog_name" value="{{ old('dog_name') }}" required
                                class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12 px-3 bg-white">
                        </div>
                        <div>
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
                    </div>
                </div>

                <!-- DYNAMIC: Prerequisite Field (Main Dog) -->
                <div id="prereq_container" class="col-span-2 hidden bg-amber-50 border-l-4 border-amber-400 p-4">
                    <label for="prereq_title" class="block text-sm font-semibold text-amber-900">Advanced Title Certificate # <span class="text-red-500">*</span></label>
                    <p class="text-xs text-amber-700 mb-2 font-medium">Performer levels require a verified Advanced Title on file.</p>
                    <input type="text" name="prereq_title" id="prereq_title" placeholder="e.g., TD-ADV-12345"
                        class="block w-full border-amber-300 focus:border-amber-500 focus:ring-amber-500 h-12 px-3">
                </div>

                <!-- Evaluation Method -->
                <div class="col-span-2 py-4 border-t border-b border-gray-100">
                    <label class="block text-sm font-semibold text-gray-700 mb-4">How should we evaluate the tricks? <span class="text-red-500">*</span></label>
                    <div class="flex flex-row gap-12">
                        <label class="inline-flex items-center cursor-pointer group">
                            <input type="radio" name="eval_method" value="online" id="method_online" {{ old('eval_method') == 'online' ? 'checked' : '' }} required class="w-5 h-5 text-training border-gray-300 focus:ring-training">
                            <span class="ml-3 text-sm text-gray-600 group-hover:text-training transition-colors font-medium">Video Submission</span>
                        </label>
                        <label class="inline-flex items-center cursor-pointer group">
                            <input type="radio" name="eval_method" value="in-person" id="method_person" {{ old('eval_method') == 'in-person' ? 'checked' : '' }} class="w-5 h-5 text-training border-gray-300 focus:ring-training">
                            <span class="ml-3 text-sm text-gray-600 group-hover:text-training transition-colors font-medium">In-Person Evaluation</span>
                        </label>
                    </div>
                </div>

                <!-- Video Input (Primary Dog) -->
                <div id="video_main_container" class="col-span-2 hidden">
                    <label for="video_link" class="block text-sm font-semibold text-gray-700">Video Link for <span id="primary_dog_name_display">Primary Dog</span> <span class="text-red-500">*</span></label>
                    <input type="url" name="video_link" id="video_link" placeholder="https://www.youtube.com/watch?v=..."
                        class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12 px-3">
                </div>

                <!-- Location Container -->
                <div id="location_container" class="col-span-2 hidden">
                    <label for="location" class="block text-sm font-semibold text-gray-700">Preferred Evaluation Center <span class="text-red-500">*</span></label>
                    <select name="location" id="location" class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12 px-3 bg-white">
                        <option value="">-- Choose a Location --</option>
                        <option value="Main Street">Main Street Training Hub</option>
                        <option value="Rogers County">Rogers County Annex</option>
                    </select>
                </div>

                <!-- Multi-dog Logic -->
                <div class="col-span-2 pt-4 bg-gray-50/50 p-6 rounded-lg border border-gray-100">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="multi_dog_trigger" class="w-5 h-5 text-training border-gray-300 focus:ring-training rounded">
                        <span class="ml-3 text-sm font-bold text-gray-700 uppercase tracking-tight">Add Additional Dogs?</span>
                    </label>

                    <div id="multi_dog_count_container" class="hidden mt-6">
                        <label for="additional_dogs" class="block text-sm font-semibold text-gray-700 mb-2">How many additional dogs? ($15 per extra dog)</label>
                        <input type="number" name="additional_dogs" id="additional_dogs" value="0" min="0" max="10"
                            class="block w-24 border-gray-300 focus:border-training focus:ring-training h-12 px-3">
                        
                        <!-- DYNAMIC CONTAINER -->
                        <div id="additional_dogs_fields" class="mt-8 space-y-6"></div>
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
        const dogNameInput = document.getElementById('dog_name');
        const primaryDogNameDisplay = document.getElementById('primary_dog_name_display');
        const levelSelect = document.getElementById('trick_level');
        const prereqDiv = document.getElementById('prereq_container');
        const prereqInput = document.getElementById('prereq_title');
        
        const videoMainDiv = document.getElementById('video_main_container');
        const videoMainInput = document.getElementById('video_link');
        const locationDiv = document.getElementById('location_container');
        const locationSelect = document.getElementById('location');

        const multiCheck = document.getElementById('multi_dog_trigger');
        const multiCountDiv = document.getElementById('multi_dog_count_container');
        const additionalDogsInput = document.getElementById('additional_dogs');
        const additionalFieldsContainer = document.getElementById('additional_dogs_fields');
        const feeDisplay = document.getElementById('fee_display');

        const methodRadios = document.querySelectorAll('input[name="eval_method"]');

        // Update name label for primary dog link
        dogNameInput.addEventListener('input', function() {
            primaryDogNameDisplay.innerText = this.value || 'Primary Dog';
        });

        // 1. Level Toggle for Main Dog
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

        // 2. Evaluation Method Toggles
        function updateMethodVisibility() {
            const selectedMethod = document.querySelector('input[name="eval_method"]:checked')?.value;
            
            if (selectedMethod === 'online') {
                videoMainDiv.classList.remove('hidden');
                videoMainInput.required = true;
                locationDiv.classList.add('hidden');
                locationSelect.required = false;
            } else if (selectedMethod === 'in-person') {
                videoMainDiv.classList.add('hidden');
                videoMainInput.required = false;
                locationDiv.classList.remove('hidden');
                locationSelect.required = true;
            }
            renderAdditionalFields(); 
        }

        methodRadios.forEach(r => r.addEventListener('change', updateMethodVisibility));

        // 3. Dynamic Field Rendering
        function renderAdditionalFields() {
            const count = parseInt(additionalDogsInput.value) || 0;
            const isOnline = document.querySelector('input[name="eval_method"]:checked')?.value === 'online';
            
            additionalFieldsContainer.innerHTML = ''; 

            for (let i = 1; i <= count; i++) {
                const section = document.createElement('div');
                section.className = 'p-6 bg-white border border-gray-200 shadow-sm space-y-4 rounded-md';
                
                let videoFieldHtml = '';
                if (isOnline) {
                    videoFieldHtml = `
                        <div class="col-span-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase">Video Link <span class="text-red-500">*</span></label>
                            <input type="url" name="additional_dog_video[]" required 
                                class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12 px-3 bg-gray-50"
                                placeholder="https://youtube.com/...">
                        </div>
                    `;
                }

                section.innerHTML = `
                    <p class="text-xs font-bold text-training uppercase tracking-widest mb-4">Additional Dog #${i}</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase">Dog's Name <span class="text-red-500">*</span></label>
                            <input type="text" name="additional_dog_names[]" required 
                                class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12 px-3 bg-gray-50"
                                placeholder="Enter dog's name">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase">Level Applying For <span class="text-red-500">*</span></label>
                            <select name="additional_dog_levels[]" required
                                class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12 px-3 bg-gray-50">
                                <option value="">-- Select Level --</option>
                                <option value="Novice">Novice</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                                <option value="Performer">Performer</option>
                                <option value="Elite Performer">Elite Performer</option>
                            </select>
                        </div>
                        ${videoFieldHtml}
                    </div>
                `;
                additionalFieldsContainer.appendChild(section);
            }
            calculateFee();
        }

        // 4. Price and Checkbox Logic
        function calculateFee() {
            const base = 25;
            const extraCount = parseInt(additionalDogsInput.value) || 0;
            const total = base + (extraCount * 15);
            feeDisplay.innerText = '$' + total;
        }

        multiCheck.addEventListener('change', function() {
            if (this.checked) {
                multiCountDiv.classList.remove('hidden');
                if (additionalDogsInput.value == 0) additionalDogsInput.value = 1;
            } else {
                multiCountDiv.classList.add('hidden');
                additionalDogsInput.value = 0;
            }
            renderAdditionalFields();
        });

        additionalDogsInput.addEventListener('input', renderAdditionalFields);
        
        // Initial Run
        updateMethodVisibility();
        if (multiCheck.checked) multiCountDiv.classList.remove('hidden');
        renderAdditionalFields();
    });
</script>
@endsection