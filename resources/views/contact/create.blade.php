@extends('layouts.blog-base')

@section('page_content')
<div class="mx-auto max-w-4xl pt-10 pb-10">
    <div class="flex flex-col lg:flex-row gap-10">
        <div class="w-full lg:w-3/4">
            <h4 class="uppercase text-xs font-bold">Ask Us Anything</h4>
            <h1 class="font-heading text-7xl">Get in Touch With<br />Southern Plains Sport Dog Club.</h1>

            <p class="text-base mb-2">Have questions about the league, our training meet-ups, or membership? Select a topic below and we'll route your message to the right person.</p>
        </div>
    </div>
<div class="container mx-auto px-4 py-12 max-w-4xl">

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
    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6 bg-gray-50 p-8 rounded-lg shadow-xl">
        @csrf

        <!-- Name Fields -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name <span class="text-red-500">*</span></label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-club focus:ring-club">
                @error('first_name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name <span class="text-red-500">*</span></label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-club focus:ring-club">
                @error('last_name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Contact Fields -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address <span class="text-red-500">*</span></label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-club focus:ring-club">
                @error('email') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="contact_phone" class="block text-sm font-medium text-gray-700">Contact Phone (Optional)</label>
                <input type="tel" name="contact_phone" id="contact_phone" value="{{ old('contact_phone') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-club focus:ring-club">
                @error('contact_phone') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Inquiry Type Dropdown -->
        <div>
            <label for="inquiry_type" class="block text-sm font-medium text-gray-700">What is your inquiry about? <span class="text-red-500">*</span></label>
            <select name="inquiry_type" id="inquiry_type" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-club focus:ring-club">
                <option value="" disabled selected>-- Select a topic --</option>
                <option value="General Club Inquiry" {{ old('inquiry_type') == 'General Club Inquiry' ? 'selected' : '' }}>General Club Inquiry</option>
                <option value="2026 League Question" {{ old('inquiry_type') == '2026 League Question' ? 'selected' : '' }}>2026 League Question (Scoring or Dates)</option>
                <option value="Trial/Training Day Logistics" {{ old('inquiry_type') == 'Trial/Training Day Logistics' ? 'selected' : '' }}>Trial/Training Day Logistics (Registration, location)</option>
                <option value="Private Training / Behavior Consultation" {{ old('inquiry_type') == 'Private Training / Behavior Consultation' ? 'selected' : '' }}>Private Training / Behavior Consultation</option>
                <option value="Class Enrollment (Group Training)" {{ old('inquiry_type') == 'Class Enrollment (Group Training)' ? 'selected' : '' }}>Class Enrollment (Group Training)</option>
                <option value="Community Meet-Up / Casual Training" {{ old('inquiry_type') == 'Community Meet-Up / Casual Training' ? 'selected' : '' }}>Community Meet-Up / Casual Training</option>
                <option value="Membership & Volunteer Information" {{ old('inquiry_type') == 'Membership & Volunteer Information' ? 'selected' : '' }}>Membership & Volunteer Information</option>
                <option value="Sponsorship/Partnership Inquiry" {{ old('inquiry_type') == 'Sponsorship/Partnership Inquiry' ? 'selected' : '' }}>Sponsorship/Partnership Inquiry</option>
            </select>
            @error('inquiry_type') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>
        
        <!-- Current Member Radio Buttons -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Are you a current club member?</label>
            <div class="flex space-x-4">
                <div class="flex items-center">
                    <input id="is_member_yes" name="is_member" type="radio" value="Yes" {{ old('is_member') == 'Yes' ? 'checked' : '' }} class="h-4 w-4 text-club focus:ring-club border-gray-300">
                    <label for="is_member_yes" class="ml-2 block text-sm text-gray-900">Yes</label>
                </div>
                <div class="flex items-center">
                    <input id="is_member_no" name="is_member" type="radio" value="No" {{ old('is_member') == 'No' || old('is_member') === null ? 'checked' : '' }} class="h-4 w-4 text-club focus:ring-club border-gray-300">
                    <label for="is_member_no" class="ml-2 block text-sm text-gray-900">No</label>
                </div>
            </div>
        </div>

        <!-- Message / Question Textarea -->
        <div>
            <label for="message" class="block text-sm font-medium text-gray-700">Message / Question <span class="text-red-500">*</span></label>
            <textarea name="message" id="message" rows="5" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-club focus:ring-club">{{ old('message') }}</textarea>
            @error('message') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <button type="submit" class="w-full inline-flex justify-center py-3 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-club hover:bg-club/80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-club transition duration-150">
                Send Message
            </button>
        </div>
    </form>

    <!-- Fallback Info -->
    <div class="mt-10 text-center text-sm text-gray-500">
        If the form does not work, please email us directly at <a href="mailto:your-club-email@example.com" class="text-club hover:text-club-dark font-semibold">your-club-email@example.com</a>.
    </div>

</div>

<!-- End of form -->

</div>
@endsection