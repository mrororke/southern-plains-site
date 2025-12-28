@extends('layouts.base-training')

@section('page_content')

<div class="mx-auto max-w-4xl pt-10 pb-10">
    <div class="flex flex-col lg:flex-row gap-10">
        <div class="w-full lg:w-3/4">
            <h4 class="uppercase text-xs font-bold">New Client Onboarding</h4>
            <h1 class="font-heading text-7xl">Tell Us Your<br />Training History</h1>

            <p class="text-base mb-2">To help us prepare for our upcoming intro call, please provide a detailed history of your dog's training and behaviors. Once you submit this form, we will review your information and reach out shortly to get you on the schedule.</p>
        </div>
    </div>
    <div class="container mx-auto px-4 max-w-4xl">

        <!-- Success/Error Messages -->
        @if (session('success'))
        <div class="bg-club/10 border-l-4 border-club text-club p-4 mb-6 rounded" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded" role="alert">
            {{ session('error') }}
        </div>
        @endif

        <!-- Form -->
        <form action="{{ route('emails.history.store') }}" method="POST" class="space-y-6 p-8">
            @csrf

                <!-- Section One: Owner Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div>
                            <label for="first_name" class="block text-sm font-semibold text-gray-700">First Name <span class="text-red-500">*</span></label>
                            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-club focus:ring-club h-12">
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label for="last_name" class="block text-sm font-semibold text-gray-700">Last Name <span class="text-red-500">*</span></label>
                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-club focus:ring-club h-12">
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-club focus:ring-club h-12">
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-700">Phone Number <span class="text-red-500">*</span></label>
                            <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-club focus:ring-club h-12">
                        </div>

                        <!-- Preferred Contact Method -->
                        <div class="md:col-span-2 mt-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-4">Preferred Method of Contact <span class="text-red-500">*</span></label>
                            <div class="flex flex-wrap gap-8">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="preferred_contact" value="email" {{ old('preferred_contact') == 'email' ? 'checked' : '' }} required class="w-5 h-5 text-training border-gray-300 focus:ring-training">
                                    <span class="ml-3 text-sm text-gray-600">Email</span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="preferred_contact" value="phone" {{ old('preferred_contact') == 'phone' ? 'checked' : '' }} class="w-5 h-5 text-training border-gray-300 focus:ring-training">
                                    <span class="ml-3 text-sm text-gray-600">Phone Call</span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="preferred_contact" value="text" {{ old('preferred_contact') == 'text' ? 'checked' : '' }} class="w-5 h-5 text-training border-gray-300 focus:ring-training">
                                    <span class="ml-3 text-sm text-gray-600">Text Message</span>
                                </label>
                            </div>
                        </div>
                    </div>



            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit" class="w-full inline-flex justify-center py-3 px-4 border border-transparent uppercase text-sm font-medium rounded-md text-white bg-training hover:bg-training/80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-training transition duration-150">
                    Send History
                </button>
            </div>


        </form>

        <!-- Fallback Info -->
        <div class="mt-10 text-center text-sm text-gray-500">
            If the form does not work, please email us directly at <a href="mailto:southernplainssportdogclub@gmail.com" class="text-training hover:text-training-dark font-semibold">southernplainssportdogclub@gmail.com</a>.
        </div>

    </div>

    <!-- End of form -->

</div>
@endsection