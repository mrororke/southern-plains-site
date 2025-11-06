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
<div>
    <div class="md:col-span-1 border-2 border-training-blue-default rounded-xl p-8 shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-[1.02] bg-white">
    
    <div class="flex items-center mb-4">
        <svg class="w-8 h-8 text-training-blue-default mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <h2 class="text-3xl font-extrabold text-gray-900">
            The Predictable Path
        </h2>
    </div>
    
    <p class="text-gray-700 mb-6 border-b pb-4">
        This specialized **in-person class** is designed for dogs who feel overwhelmed or reactive in public settings. We use the **Course Circle technique** to build focus, confidence, and calmness around triggers.
    </p>

    <ul class="list-disc list-inside space-y-2 text-gray-600 mb-8 ml-4">
        <li>**Builds Confidence:** Uses repeating circuits (platforms, cavalletti, slow feeders) for clear routines.</li>
        <li>**Reduces Reactivity:** Transforms fear into focused engagement with predictable environmental cues.</li>
        <li>**Essential Trust:** Teaches the dog independence and solidifies the handler/dog bond.</li>
    </ul>

    <div class="text-lg font-bold text-gray-800 mb-4">
        Format: In-Person Class
    </div>
    <div class="text-lg font-bold text-gray-800 mb-8">
        Duration/Cost: Varies (See Schedule)
    </div>

    <a href="#class-registration" 
       class="block w-full text-center bg-training-blue-default text-white py-3 rounded-lg font-bold uppercase tracking-wider 
              hover:bg-training-blue-hover focus:outline-none focus:ring-4 focus:ring-training-blue-default focus:ring-opacity-50 transition duration-150 shadow-md">
        View Schedule & Register
    </a>
    
    <p class="mt-4 text-sm text-gray-500 text-center">
        Registration is required to attend.
    </p>

</div>
          <div class="md:col-span-1 border-2 border-training-default  p-8 shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-[1.02] bg-white">
    
    <div class="flex items-center mb-4">
        <svg class="w-8 h-8 text-training mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.65 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
        <h2 class="text-3xl font-extrabold text-black">
            Private Training
        </h2>
    </div>
    
    <p class="text-black mb-6 border-b pb-4">
        Customized, **one-on-one sessions** tailored specifically to your dog's most pressing behavioral needs, sport goals, or obedience challenges. This format is ideal for:
    </p>

    <ul class="list-disc list-inside space-y-2 text-black mb-8 ml-4">
        <li>**Complex Issues:** Aggression, severe anxiety, and fear-based reactivity.</li>
        <li>**Personalized Coaching:** Focused work on advanced sport techniques (e.g., Trailing mechanics).</li>
        <li>**Flexible Scheduling:** Sessions designed around your life and unique home environment.</li>
    </ul>

    <div class="text-lg font-bold text-black mb-4">
        Format: In-Person / Virtual
    </div>
    <div class="text-lg font-bold text-black mb-8">
        Cost: Varies (Customized Packages)
    </div>

    <a href="#consultation-form" 
       class="block w-full text-center bg-training text-white py-3 font-bold uppercase tracking-wider 
              hover:bg-training-hover focus:outline-none focus:ring-4 focus:ring-training-blue-default focus:ring-opacity-50 transition duration-150 shadow-md">
        Request Consultation
    </a>
    
    <p class="mt-4 text-sm text-black text-center">
        Use the form to schedule a 15-minute introductory call.
    </p>

</div>  
        </div>

</div>
@endsection