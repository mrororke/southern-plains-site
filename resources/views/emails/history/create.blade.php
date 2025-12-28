@extends('layouts.base-training')

@section('page_content')

<div class="mx-auto max-w-4xl pt-10 pb-20 px-4">
    <!-- Header Section -->
    <div class="mb-12">
        <h4 class="uppercase text-xs font-bold tracking-widest text-training mb-2">Training History</h4>
        <h1 class="font-heading text-5xl md:text-7xl leading-tight mb-6">The Basics of<br/> Your History.</h1>
        <p class="text-gray-600 text-lg max-w-2xl">To get a head start on our intro call, please provide a brief overview of your dog’s background. This helps us dive right in when we talk.</p>
    </div>

    <!-- Notifications -->
    @if (session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-8" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <!-- Form Start -->
    <form action="{{ route('emails.history.store') }}" method="POST" class="space-y-10">
        @csrf

        <!-- Section 1: Personal Details (2 Columns) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-1">
                <label for="first_name" class="block text-sm font-bold uppercase tracking-wider text-gray-700">First Name <span class="text-red-500">*</span></label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required
                    class="block w-full border-gray-300 focus:border-training focus:ring-0 h-14 px-4 transition-all">
            </div>

            <div class="space-y-1">
                <label for="last_name" class="block text-sm font-bold uppercase tracking-wider text-gray-700">Last Name <span class="text-red-500">*</span></label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required
                    class="block w-full border-gray-300 focus:border-training focus:ring-0 h-14 px-4 transition-all">
            </div>

            <div class="space-y-1">
                <label for="email" class="block text-sm font-bold uppercase tracking-wider text-gray-700">Email Address <span class="text-red-500">*</span></label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="block w-full border-gray-300 focus:border-training focus:ring-0 h-14 px-4 transition-all">
            </div>

            <div class="space-y-1">
                <label for="phone" class="block text-sm font-bold uppercase tracking-wider text-gray-700">Phone Number <span class="text-red-500">*</span></label>
                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required
                    class="block w-full border-gray-300 focus:border-training focus:ring-0 h-14 px-4 transition-all">
            </div>
        </div>

        <!-- Section 2: Contact Preference (Full Width Row) -->
        <div class="pt-4 pb-2 border-t border-b border-gray-100">
            <label class="block text-sm font-bold uppercase tracking-wider text-gray-700 mb-6">Preferred Method of Contact <span class="text-red-500">*</span></label>
            <div class="flex flex-wrap gap-8 md:gap-16">
                <label class="inline-flex items-center cursor-pointer group">
                    <input type="radio" name="preferred_contact" value="email" {{ old('preferred_contact') == 'email' ? 'checked' : '' }} required class="w-5 h-5 text-training border-gray-300 focus:ring-training">
                    <span class="ml-3 text-gray-700 font-medium group-hover:text-training">Email</span>
                </label>
                <label class="inline-flex items-center cursor-pointer group">
                    <input type="radio" name="preferred_contact" value="phone" {{ old('preferred_contact') == 'phone' ? 'checked' : '' }} class="w-5 h-5 text-training border-gray-300 focus:ring-training">
                    <span class="ml-3 text-gray-700 font-medium group-hover:text-training">Phone Call</span>
                </label>
                <label class="inline-flex items-center cursor-pointer group">
                    <input type="radio" name="preferred_contact" value="text" {{ old('preferred_contact') == 'text' ? 'checked' : '' }} class="w-5 h-5 text-training border-gray-300 focus:ring-training">
                    <span class="ml-3 text-gray-700 font-medium group-hover:text-training">Text Message</span>
                </label>
            </div>
        </div>

        <!-- Section 3: Location & Referral (2 Columns) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-1">
                <label for="area" class="block text-sm font-bold uppercase tracking-wider text-gray-700">Area / Neighborhood <span class="text-red-500">*</span></label>
                <input type="text" name="area" id="area" value="{{ old('area') }}" required
                    class="block w-full border-gray-300 focus:border-training focus:ring-0 h-14 px-4 transition-all">
            </div>

            <div class="space-y-1">
                <label for="referred" class="block text-sm font-bold uppercase tracking-wider text-gray-700">How were you referred?</label>
                <input type="text" name="referred" id="referred" value="{{ old('referred') }}" 
                    class="block w-full border-gray-300 focus:border-training focus:ring-0 h-14 px-4 transition-all">
            </div>
        </div>

        <!-- Section 4: Textarea (Always Full Width) -->
        <div class="space-y-2">
            <label for="how_can_i_help" class="block text-sm font-bold uppercase tracking-wider text-gray-700">How can I help? <span class="text-red-500">*</span></label>
            <textarea name="how_can_i_help" id="how_can_i_help" rows="6" required
                class="block w-full border-gray-300 focus:border-training focus:ring-0 p-4 transition-all" 
                placeholder="Tell us a little about your goals..."></textarea>
        </div>

        <!-- Submit Button -->
        <div class="pt-6">
            <button type="submit" class="w-full bg-training text-white py-5 px-6 uppercase text-sm font-black tracking-[0.2em] hover:bg-black transition-all duration-300 shadow-lg">
                Submit History & Request Call
            </button>
            <p class="mt-6 text-center text-xs text-gray-400 uppercase tracking-widest">
                Technical issues? Email <a href="mailto:southernplainssportdogclub@gmail.com" class="underline hover:text-training">southernplainssportdogclub@gmail.com</a>
            </p>
        </div>

    </form>
</div>
@endsection