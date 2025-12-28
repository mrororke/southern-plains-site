@extends('layouts.base-training')

@section('page_content')

<div class="mx-auto max-w-4xl py-12 px-4">
    <div class="mb-10">
        <h4 class="uppercase text-xs font-bold tracking-widest text-training mb-2">Training History</h4>
        <h1 class="font-heading text-5xl md:text-7xl leading-tight mb-4">The Basics of<br/> Your History.</h1>
        <p class="text-gray-600">To get a head start on our intro call, please provide a brief overview of your dog’s background.</p>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('emails.history.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
            
            <!-- Row 1 -->
            <div class="md:col-span-6">
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name *</label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:ring-training focus:border-training">
            </div>

            <div class="md:col-span-6">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name *</label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:ring-training focus:border-training">
            </div>

            <!-- Row 2 -->
            <div class="md:col-span-6">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address *</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:ring-training focus:border-training">
            </div>

            <div class="md:col-span-6">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number *</label>
                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:ring-training focus:border-training">
            </div>

            <!-- Row 3: Full Width Radio -->
            <div class="md:col-span-12 py-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Preferred Method of Contact *</label>
                <div class="flex space-x-6">
                    <label class="inline-flex items-center">
                        <input type="radio" name="preferred_contact" value="email" class="text-training focus:ring-training" required>
                        <span class="ml-2">Email</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="preferred_contact" value="phone" class="text-training focus:ring-training">
                        <span class="ml-2">Phone Call</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="preferred_contact" value="text" class="text-training focus:ring-training">
                        <span class="ml-2">Text</span>
                    </label>
                </div>
            </div>

            <!-- Row 4 -->
            <div class="md:col-span-6">
                <label for="area" class="block text-sm font-medium text-gray-700">Area / Neighborhood *</label>
                <input type="text" name="area" id="area" value="{{ old('area') }}" required
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:ring-training focus:border-training">
            </div>

            <div class="md:col-span-6">
                <label for="referred" class="block text-sm font-medium text-gray-700">How were you referred?</label>
                <input type="text" name="referred" id="referred" value="{{ old('referred') }}"
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:ring-training focus:border-training">
            </div>

            <!-- Row 5: Full Width Textarea -->
            <div class="md:col-span-12">
                <label for="how_can_i_help" class="block text-sm font-medium text-gray-700">How can I help? *</label>
                <textarea name="how_can_i_help" id="how_can_i_help" rows="5" required
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:ring-training focus:border-training"></textarea>
            </div>

            <!-- Submit -->
            <div class="md:col-span-12 pt-4">
                <button type="submit" class="w-full bg-training text-white py-4 px-6 uppercase text-sm font-bold tracking-widest hover:bg-training/90 transition-colors">
                    Submit History
                </button>
            </div>
        </div>
    </form>
</div>
@endsection