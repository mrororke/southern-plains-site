@extends('layouts.base-training')

@section('page_content')

<div class="mx-auto max-w-4xl pt-10 pb-10">
    <div class="flex flex-col lg:flex-row gap-10">
        <div class="w-full lg:w-3/4 px-4">
            <h4 class="uppercase text-xs font-bold">Training History</h4>
            <h1 class="font-heading text-7xl">The Basics of<br/> Your History.</h1>

            <p class="text-base mb-2">To get a head start on our intro call, please provide a brief overview of your dog’s background. This shortened history helps us understand where you're starting from so we can dive right in when we talk.</p>
        </div>
    </div>
    <div class="container mx-auto px-4 max-w-4xl">

        <!-- Success/Error Messages -->
        @if (session('success'))
        <div class="bg-club/10 border-l-4 border-training text-club p-4 mb-6 " role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 " role="alert">
            {{ session('error') }}
        </div>
        @endif

        <!-- Form -->
        <form action="{{ route('emails.history.store') }}" method="POST" class="space-y-8 py-8">
            @csrf

                <!-- Section One: Owner Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div>
                            <label for="first_name" class="block text-sm font-semibold text-gray-700">First Name <span class="text-red-500">*</span></label>
                            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required
                                class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12">
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label for="last_name" class="block text-sm font-semibold text-gray-700">Last Name <span class="text-red-500">*</span></label>
                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required
                                class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12">
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12">
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-700">Phone Number <span class="text-red-500">*</span></label>
                            <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required
                                class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12">
                        </div>

                        <!-- Preferred Contact Method - Full Width Row -->
                        <div class="col-span-2 py-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-4">Preferred Method of Contact <span class="text-red-500">*</span></label>
                            <div class="flex flex-row sm:flex-row gap-6 sm:gap-12">
                                <label class="inline-flex items-center cursor-pointer group">
                                    <input type="radio" name="preferred_contact" value="email" {{ old('preferred_contact') == 'email' ? 'checked' : '' }} required class="w-5 h-5 text-training border-gray-300 focus:ring-training">
                                    <span class="ml-3 text-sm text-gray-600 group-hover:text-training transition-colors">Email</span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer group">
                                    <input type="radio" name="preferred_contact" value="phone" {{ old('preferred_contact') == 'phone' ? 'checked' : '' }} class="w-5 h-5 text-training border-gray-300 focus:ring-training">
                                    <span class="ml-3 text-sm text-gray-600 group-hover:text-training transition-colors">Phone Call</span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer group">
                                    <input type="radio" name="preferred_contact" value="text" {{ old('preferred_contact') == 'text' ? 'checked' : '' }} class="w-5 h-5 text-training border-gray-300 focus:ring-training">
                                    <span class="ml-3 text-sm text-gray-600 group-hover:text-training transition-colors">Text Message</span>
                                </label>
                            </div>
                        </div>

                        <!-- New Row: Area and Referral -->
                        <div>
                            <label for="area" class="block text-sm font-semibold text-gray-700">What area do you live in? <span class="text-red-500">*</span></label>
                            <input type="text" name="area" id="area" value="{{ old('area') }}" required
                                class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12">
                        </div>

                        <div>
                            <label for="referred" class="block text-sm font-semibold text-gray-700">How were you referred? </label>
                            <input type="text" name="referred" id="referred" value="{{ old('referred') }}" 
                                class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12">
                        </div>

                        <div>
                            <label for="dog_name" class="block text-sm font-semibold text-gray-700">What is your dog's name? <span class="text-red-500">*</span></label>
                            <input type="text" name="dog_name" id="dog_name" value="{{ old('dog_name') }}" required
                                class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12">
                        </div>

                        <div>
                            <label for="dog_breed" class="block text-sm font-semibold text-gray-700">What is your dog's breed? </label>
                            <input type="text" name="dog_breed" id="dog_breed" value="{{ old('dog_breed') }}" 
                                class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12">
                        </div>

                        <div>
                            <label for="dog_age" class="block text-sm font-semibold text-gray-700">What is your dog's age? <span class="text-red-500">*</span></label>
                            <input type="text" name="dog_age" id="dog_age" value="{{ old('dog_age') }}" required
                                class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training h-12">
                        </div>

                        <div class="py-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-4">What is your dog's gender? <span class="text-red-500">*</span></label>
                            <div class="flex flex-row sm:flex-row gap-6 sm:gap-12">
                                <label class="inline-flex items-center cursor-pointer group">
                                    <input type="radio" name="gender" value="email" {{ old('gender') == 'male' ? 'checked' : '' }} required class="w-5 h-5 text-training border-gray-300 focus:ring-training">
                                    <span class="ml-3 text-sm text-gray-600 group-hover:text-training transition-colors">Male</span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer group">
                                    <input type="radio" name="gender" value="phone" {{ old('gender') == 'neutered' ? 'checked' : '' }} class="w-5 h-5 text-training border-gray-300 focus:ring-training">
                                    <span class="ml-3 text-sm text-gray-600 group-hover:text-training transition-colors">Neutered</span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer group">
                                    <input type="radio" name="gender" value="text" {{ old('gender') == 'female' ? 'checked' : '' }} class="w-5 h-5 text-training border-gray-300 focus:ring-training">
                                    <span class="ml-3 text-sm text-gray-600 group-hover:text-training transition-colors">Female</span>
                                </label><label class="inline-flex items-center cursor-pointer group">
                                    <input type="radio" name="gender" value="text" {{ old('gender') == 'spayed' ? 'checked' : '' }} class="w-5 h-5 text-training border-gray-300 focus:ring-training">
                                    <span class="ml-3 text-sm text-gray-600 group-hover:text-training transition-colors">Spayed</span>
                                </label>
                        </div>
</div>

                        <!-- How can I help field -->
                        <div class="col-span-2">
                            <label for="how_can_i_help" class="block text-sm font-semibold text-gray-700">How can I help? <span class="text-red-500">*</span></label>
                            <textarea name="how_can_i_help" id="how_can_i_help" rows="4" required
                                class="mt-1 block w-full border-gray-300 focus:border-training focus:ring-training p-3" placeholder="Tell us a little about your goals..."></textarea>
                        </div>
                    </div>

            <!-- Submit Button -->
            <div class="pt-6">
                <button type="submit" class="w-full inline-flex justify-center py-4 px-4 border border-transparent uppercase text-sm font-bold tracking-widest text-white bg-training hover:bg-training/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-training transition-all duration-150">
                    Let's Talk!
                </button>
            </div>


        </form>

        <!-- Fallback Info -->
        <div class="mt-10 text-center text-sm text-gray-500">
            If the form does not work, please email us directly at <a href="mailto:southernplainssportdogclub@gmail.com" class="text-training hover:text-training-dark font-semibold">southernplainssportdogclub@gmail.com</a>.
        </div>

    </div>

</div>
@endsection