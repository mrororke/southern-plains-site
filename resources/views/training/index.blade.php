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
          <div class="md:col-span-1 border-2 border-training-default  p-8 shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-[1.02] bg-white">
    
    <div class="flex items-center mb-4">
        <svg class="w-8 h-8 text-training mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.31-2.69 6-6 6s-6-2.69-6-6 2.69-6 6-6 6 2.69 6 6zm-6 0h.01M21 21l-4.35-4.35"></path></svg>
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