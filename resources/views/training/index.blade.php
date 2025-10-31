@extends('layouts.base')

@section('page_content')
<div class="container mx-auto px-6 py-12">

    {{-- 1. Custom Header & Logo Section --}}
    <header class="mb-10 text-center">
        {{-- Place the Training Logo here --}}
        {{-- Assuming you have a specific logo for your services/training brand --}}
        <img src="{{ asset('images/logos/training-blue-logo.svg') }}" 
             alt="Southern Plains Dog Training Services Logo"
             class="h-16 w-auto mx-auto mb-4"> 
             
        <h1 class="text-5xl font-extrabold tracking-tight text-gray-900">
            Our <span class="text-training-blue-default">Compassionate</span> Training Services
        </h1>
        <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">
            Effective, positive reinforcement strategies for behavioral challenges and sportsmanship.
        </p>
    </header>

    ---

    {{-- 2. Core Service Offerings (Flex/Grid Layout) --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">

        {{-- Service Card 1: Behavior Consulting --}}
        <div class="border border-training-blue-default rounded-lg p-6 shadow-md hover:shadow-xl transition duration-300">
            <h2 class="text-2xl font-bold mb-3 text-training-blue-default">
                Behavior Consulting
            </h2>
            <p class="text-gray-700 mb-4">
                Specialized help for anxiety, fear, and reactivity (Luka's Legacy). Personalized plans and ongoing support.
            </p>
            <a href="#" class="inline-flex items-center text-training-blue-default hover:text-training-blue-hover font-semibold">
                Learn More 
                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>

        {{-- Service Card 2: Foundational Obedience --}}
        <div class="border border-training-blue-default rounded-lg p-6 shadow-md hover:shadow-xl transition duration-300">
            <h2 class="text-2xl font-bold mb-3 text-training-blue-default">
                Puppy & Basic Skills
            </h2>
            <p class="text-gray-700 mb-4">
                Build a solid foundation with essential commands, socialization guidance, and house manners using positive methods.
            </p>
             <a href="#" class="inline-flex items-center text-training-blue-default hover:text-training-blue-hover font-semibold">
                View Classes 
                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>

        {{-- Service Card 3: Dog Sports --}}
        <div class="border border-training-blue-default rounded-lg p-6 shadow-md hover:shadow-xl transition duration-300">
            <h2 class="text-2xl font-bold mb-3 text-training-blue-default">
                NASDA & Trick Dog
            </h2>
            <p class="text-gray-700 mb-4">
                Fun, competitive courses including Shed Hunting (like Moose!) and Novice Trick Titles.
            </p>
             <a href="#" class="inline-flex items-center text-training-blue-default hover:text-training-blue-hover font-semibold">
                See Trial Schedule 
                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </div>

    ---

    {{-- 3. Next Step / Call to Action (CTA) --}}
    <div class="mt-16 bg-training-blue-default p-10 rounded-lg text-center text-white shadow-xl">
        <h2 class="text-3xl font-extrabold mb-3">Ready to Transform Your Partnership?</h2>
        <p class="mb-6 text-lg">
            Book a free 15-minute introductory call to discuss your dog's specific needs and our training philosophy.
        </p>
        <a href="#" class="bg-white text-training-blue-default hover:bg-gray-100 font-bold py-3 px-8 rounded-full shadow-lg transition duration-300">
            Schedule Your Free Consultation
        </a>
    </div>

</div>
@endsection