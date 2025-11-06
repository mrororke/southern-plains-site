@extends('layouts.base-training')

@section('page_content')
<div class="mx-auto pt-10">
    <div class="flex flex-col lg:flex-row gap-10">
        <div class="w-full lg:w-3/4">
            <h4 class="uppercase text-xs font-bold">Southern Plains Training</h4>
            <h1 class="font-heading text-7xl">Training the dog you have.<br />Building the partner you need.</h1>

            <p class="text-base mb-2">We specialize in compassionate, positive reinforcement training, focusing on real-world solutions for complex behaviors like anxiety and reactivity. From foundational puppy skills to advanced skills, our methods empower handlers to build trust and achieve mutual success, all while prioritizing your dog's comfort and confidence.</p>
        </div>
        <aside class="w-full lg:w-1/4 pt-4 lg:pt-0">
            {{-- STATIC FILTER/SEARCH AREA --}}
            <div class="mb-10 p-4">
                <div class="flex flex-col md:flex-column gap-4">
                    aside
                </div>
            </div>
        </aside>

        
    </div>
<div class="grid grid-cols-1 md:grid-cols-5 gap-8 mt-12">

    <div class="md:col-span-1 border-2 border-training-blue-default p-8 shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-[1.02] bg-white">
        
        <div class="flex items-center mb-4">
            <svg class="w-8 h-8 text-training-blue-default mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.65 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h2 class="text-xl font-extrabold text-black">
                Private Training
            </h2>
        </div>
        
        <p class="text-black mb-6 border-b pb-4 text-sm">
            Customized, **one-on-one sessions** for complex issues, sport goals, or obedience challenges.
        </p>

        <ul class="list-disc list-inside space-y-2 text-black mb-8 ml-4 text-sm">
            <li>**Complex Issues:** Aggression, anxiety, and fear-based reactivity.</li>
            <li>**Personalized Coaching:** Advanced sport techniques.</li>
            <li>**Flexible Scheduling:** Designed around your unique environment.</li>
        </ul>

        <div class="text-sm font-bold text-black mb-4">
            Format: In-Person / Virtual
        </div>
        <div class="text-sm font-bold text-black mb-8">
            Cost: Varies (Customized Packages)
        </div>

        <a href="#consultation-form" 
           class="block w-full text-center bg-training-blue-default text-white py-3 font-bold uppercase tracking-wider 
                  hover:bg-training-blue-hover focus:outline-none focus:ring-4 focus:ring-training-blue-default focus:ring-opacity-50 transition duration-150 shadow-md text-sm">
            Request Consultation
        </a>
        
        <p class="mt-4 text-xs text-black text-center">
            Schedule a 15-minute introductory call.
        </p>

    </div>

    <div class="md:col-span-3 border-2 border-training-blue-default p-8 shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-[1.02] bg-white">
        
        <div class="flex items-center mb-4">
            <svg class="w-8 h-8 text-training-blue-default mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <h2 class="text-3xl font-extrabold text-black">
                The Predictable Path
            </h2>
        </div>
        
        <p class="text-black mb-6 border-b pb-4">
            This specialized **in-person class** uses the **Course Circle technique**—a highly predictable, repeating circuit of stations (platforms, cavalletti, slow feeders)—to help your dog build focus, confidence, and calmness around triggers, transforming fear into engagement.
        </p>

        <ul class="list-disc list-inside space-y-2 text-black mb-8 ml-4">
            <li>**Builds Confidence:** Uses repeating circuits for clear routines and environmental cues.</li>
            <li>**Reduces Reactivity:** Transforms fear into focused engagement with predictability.</li>
            <li>**Essential Trust:** Establishes clear routines, building independence and the handler/dog bond.</li>
        </ul>

        <div class="text-lg font-bold text-black mb-4">
            Format: In-Person Class (Limestone Acres Dog Sports)
        </div>
        <div class="text-lg font-bold text-black mb-8">
            Duration/Cost: Varies (See Schedule)
        </div>

        <a href="#class-registration" 
           class="block w-full text-center bg-training-blue-default text-white py-3 font-bold uppercase tracking-wider 
                  hover:bg-training-blue-hover focus:outline-none focus:ring-4 focus:ring-training-blue-default focus:ring-opacity-50 transition duration-150 shadow-md">
            View Schedule & Register
        </a>
        
        <p class="mt-4 text-sm text-black text-center">
            Registration is required to attend.
        </p>

    </div>

    <div class="md:col-span-1 border-2 border-black p-8 shadow-lg bg-gray-50 opacity-80">
        
        <div class="flex items-center mb-4">
            <svg class="w-8 h-8 text-black mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h2 class="text-xl font-extrabold text-black">
                Coming Soon!
            </h2>
        </div>
        
        <h3 class="text-2xl font-bold text-black mb-6 border-b pb-4">
            Click to Calm!
        </h3>

        <p class="text-black mb-6 text-sm">
            Specialized behavior modification focused on transforming unwanted, reactive, and aggressive dog behavior using Emma Parson's award-winning, science-based methodology.
        </p>
        
        <p class="font-bold text-black mb-8 text-sm">
            Be the first to know when this class opens for enrollment!
        </p>

        <a href="#waitlist-signup" 
           class="block w-full text-center bg-black text-white py-3 font-bold uppercase tracking-wider 
                  hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-black transition duration-150 shadow-md cursor-pointer text-sm">
            Join Waitlist
        </a>
        
        <p class="mt-4 text-xs text-black text-center">
            In-Person Class / Varies
        </p>

    </div>
</div>

</div>
@endsection