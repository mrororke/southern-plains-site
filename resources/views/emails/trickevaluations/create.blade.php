@extends('layouts.base-training')

@section('page_content')
<div class="mx-auto max-w-4xl pt-10 pb-10">
    <div class="flex flex-col lg:flex-row gap-10">
        <div class="w-full lg:w-3/4 px-4">
            <h4 class="uppercase text-xs font-bold tracking-widest text-black">Offical Titling & Testing</h4>
            <h1 class="font-heading text-7xl">Trick Dog<br />Evaluations.</h1>
            <p class="text-base mb-2">Ready to show off what your dogs have learned? Select the level and submission method for each dog below. In-person evaluations are held Tuesdays through Thursdays between 10:00 AM and 5:00 PM. Virtual evaluations will be completed within 72 hours of receipt.</p>
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

        <form action="{{ route('emails.trickevaluation.store') }}" method="POST" id="trickDogForm" class="space-y-8 py-8">
            @csrf
            
            <!-- Hidden input to pass the total fee to the email/controller -->
            <input type="hidden" name="total_fee" id="total_fee_input" value="10">

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
                <div class="col-span-2 p-6 bg-gray-50 border border-gray-100">
                    <p class="text-xs font-bold text-black uppercase tracking-widest mb-4">Dog #1</p>
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
                    <label for="video_link" class="block text-sm font-semibold text-gray-700">Video Link for <span id="primary_dog_name_display">Dog #1</span> <span class="text-red-500">*</span></label>
                    <input type="url" name="video_link" id="video_link" placeholder="https://www.youtube.com/watch?v=..."
                        class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12 px-3">
                </div>

                <!-- In-Person Scheduling -->
                <div id="scheduling_container" class="col-span-2 hidden">
                    <div class="p-6 bg-[#03CCFF/50] border border-training">
                        <label for="scheduled_datetime" class="block text-sm font-semibold text-black">Requested Evaluation Date & Time <span class="text-red-500">*</span></label>
                        <p class="text-xs text-black mb-3">Available Tuesdays – Thursdays, 10:00 AM – 5:00 PM.</p>
                        <input type="datetime-local" name="scheduled_datetime" id="scheduled_datetime"
                            class="block w-full border-training focus:border-training focus:ring-training h-12 px-3 bg-white">
                        <div id="date_error" class="text-red-600 text-xs mt-2 hidden font-bold"></div>
                    </div>
                </div>

                <!-- Multi-dog Logic -->
                <div class="col-span-2 pt-4 bg-gray-50/50 p-6  border border-gray-100">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="multi_dog_trigger" class="w-5 h-5 text-training border-gray-300 focus:ring-training">
                        <span class="ml-3 text-sm font-bold text-gray-700 uppercase tracking-tight">Add Additional Dogs?</span>
                    </label>

                    <div id="multi_dog_count_container" class="hidden mt-6">
                        <label for="additional_dogs" class="block text-sm font-semibold text-gray-700 mb-2">How many additional dogs? ($10 per dog)</label>
                        <input type="number" name="additional_dogs" id="additional_dogs" value="0" min="0" max="10"
                            class="block w-24 border-gray-300 focus:border-training focus:ring-training h-12 px-3">
                        
                        <div id="additional_dogs_fields" class="mt-8 space-y-6"></div>
                    </div>
                </div>

                <!-- Payment Method Selection -->
                <div class="col-span-2 p-6 bg-gray-50 border border-gray-200 mt-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-4">Preferred Payment Method <span class="text-red-500">*</span></label>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <label class="flex items-center p-3 bg-white border border-gray-300 cursor-pointer hover:border-training transition-colors">
                            <input type="radio" name="payment_method" value="Apple Pay" required class="text-training focus:ring-training">
                            <span class="ml-3 text-sm font-medium">Apple Pay</span>
                        </label>
                        <label class="flex items-center p-3 bg-white border border-gray-300 cursor-pointer hover:border-training transition-colors">
                            <input type="radio" name="payment_method" value="Venmo" class="text-training focus:ring-training">
                            <span class="ml-3 text-sm font-medium">Venmo</span>
                        </label>
                        <label class="flex items-center p-3 bg-white border border-gray-300 cursor-pointer hover:border-training transition-colors">
                            <input type="radio" name="payment_method" value="PayPal" class="text-training focus:ring-training">
                            <span class="ml-3 text-sm font-medium">PayPal</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="pt-8 border-t border-gray-200 mt-10">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-8">
                    <div class="text-center sm:text-left">
                        <p class="text-sm uppercase tracking-widest text-gray-400 font-bold">Total Evaluation Fee</p>
                        <div class="flex items-baseline gap-2">
                             <p id="fee_display" class="text-5xl font-heading text-training font-bold">$10</p>
                             <span class="text-gray-400 text-sm font-medium">($10 per dog)</span>
                        </div>
                    </div>
                    <button type="submit" id="submit_btn" class="w-full sm:w-auto px-12 py-5 bg-training text-white uppercase text-sm font-bold tracking-widest hover:bg-training/90 transition shadow-xl disabled:opacity-50">
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
        const videoMainDiv = document.getElementById('video_main_container');
        const videoMainInput = document.getElementById('video_link');
        
        const schedulingDiv = document.getElementById('scheduling_container');
        const dateTimeInput = document.getElementById('scheduled_datetime');
        const dateError = document.getElementById('date_error');
        const submitBtn = document.getElementById('submit_btn');

        const multiCheck = document.getElementById('multi_dog_trigger');
        const multiCountDiv = document.getElementById('multi_dog_count_container');
        const additionalDogsInput = document.getElementById('additional_dogs');
        const additionalFieldsContainer = document.getElementById('additional_dogs_fields');
        const feeDisplay = document.getElementById('fee_display');
        const totalFeeInput = document.getElementById('total_fee_input');

        const methodRadios = document.querySelectorAll('input[name="eval_method"]');

        // Dynamic Label for Dog #1
        dogNameInput.addEventListener('input', function() {
            primaryDogNameDisplay.innerText = this.value || 'Dog #1';
        });

        // Date & Time Validation
        dateTimeInput.addEventListener('input', function() {
            const dateValue = new Date(this.value);
            const day = dateValue.getDay(); 
            const hours = dateValue.getHours();
            
            let isValid = true;
            let errorMessage = "";

            if (day === 0 || day === 1 || day === 5 || day === 6) {
                isValid = false;
                errorMessage = "Evaluations are only available Tuesday through Thursday.";
            } 
            else if (hours < 10 || hours >= 17) {
                isValid = false;
                errorMessage = "Please select a time between 10:00 AM and 5:00 PM.";
            }

            if (!isValid && this.value !== "") {
                dateError.innerText = errorMessage;
                dateError.classList.remove('hidden');
                submitBtn.disabled = true;
                this.classList.add('border-red-500');
            } else {
                dateError.classList.add('hidden');
                submitBtn.disabled = false;
                this.classList.remove('border-red-500');
            }
        });

        function updateMethodVisibility() {
            const selectedMethod = document.querySelector('input[name="eval_method"]:checked')?.value;
            
            if (selectedMethod === 'online') {
                videoMainDiv.classList.remove('hidden');
                videoMainInput.required = true;
                schedulingDiv.classList.add('hidden');
                dateTimeInput.required = false;
            } else if (selectedMethod === 'in-person') {
                videoMainDiv.classList.add('hidden');
                videoMainInput.required = false;
                schedulingDiv.classList.remove('hidden');
                dateTimeInput.required = true;
            }
            renderAdditionalFields(); 
        }

        methodRadios.forEach(r => r.addEventListener('change', updateMethodVisibility));

        function renderAdditionalFields() {
            const count = parseInt(additionalDogsInput.value) || 0;
            const isOnline = document.querySelector('input[name="eval_method"]:checked')?.value === 'online';
            
            additionalFieldsContainer.innerHTML = ''; 

            for (let i = 1; i <= count; i++) {
                const section = document.createElement('div');
                section.className = 'p-6 bg-white border border-gray-200 shadow-sm space-y-4';
                
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
                    <p class="text-xs text-black font-bold uppercase tracking-widest mb-4">Dog #${i + 1}</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase">Dog's Name <span class="text-red-500">*</span></label>
                            <input type="text" name="additional_dog_names[]" required 
                                class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12 px-3 bg-gray-50">
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

        function calculateFee() {
            const base = 10;
            const extraCount = parseInt(additionalDogsInput.value) || 0;
            const total = base + (extraCount * 10);
            
            // Update UI
            feeDisplay.innerText = '$' + total;
            
            // Update Hidden Input for Form Submission
            totalFeeInput.value = total;
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
        
        updateMethodVisibility();
    });
</script>
@endsection