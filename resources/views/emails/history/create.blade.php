@extends('layouts.blog-base')

@section('page_content')

<div class="mx-auto max-w-4xl pt-10 pb-10">
    <div class="flex flex-col lg:flex-row gap-10">
        <div class="w-full lg:w-3/4">
            <h4 class="uppercase text-xs font-bold">New Client Onboarding</h4>
            <h1 class="font-heading text-7xl">Tell Us Your Training History</h1>

            <p class="text-base mb-2">To help us prepare for our upcoming intro call, please provide a detailed history of your dog's training and behaviors. Once you submit this form, we will review your information and reach out shortly to get you on the schedule.</p>
        </div>
    </div>
<div class="container mx-auto px-4 max-w-4xl">

Form will Go here

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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- First Name -->
            <div>
                <label for="first_name" class="block text-sm font-medium text-gray-700">Owner First Name <span class="text-red-500">*</span></label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-club focus:ring-club @error('first_name') border-red-500 @enderror">
                @error('first_name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Last Name -->
            <div>
                <label for="last_name" class="block text-sm font-medium text-gray-700">Owner Last Name <span class="text-red-500">*</span></label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-club focus:ring-club @error('last_name') border-red-500 @enderror">
                @error('last_name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <button type="submit" class="w-full inline-flex justify-center py-3 px-4 border border-transparent uppercase text-sm font-medium rounded-md text-white bg-club hover:bg-club/80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-club transition duration-150">
                Send Message
            </button>
        </div>

    
           </form>

    <!-- Fallback Info -->
    <div class="mt-10 text-center text-sm text-gray-500">
        If the form does not work, please email us directly at <a href="mailto:southernplainssportdogclub@gmail.com" class="text-club hover:text-club-dark font-semibold">southernplainssportdogclub@gmail.com</a>.
    </div>

</div>

<!-- End of form -->

</div>
@endsection