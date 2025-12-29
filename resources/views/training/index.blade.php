@extends('layouts.base-training')

@section('page_content')
<div class="mx-auto pt-10">
    <div class="flex flex-col lg:flex-row gap-10">
        <div class="w-full">
            <h4 class="uppercase text-xs font-bold">Southern Plains Training</h4>
            <h1 class="font-heading text-7xl">Training the dog you have.<br />Building the partner you need.</h1>

            <p class="text-base mb-2">We specialize in compassionate, positive reinforcement training, focusing on real-world solutions for complex behaviors like anxiety and reactivity. From foundational puppy skills to advanced skills, our methods empower handlers to build trust and achieve mutual success, all while prioritizing your dog's comfort and confidence.</p>
        </div>



    </div>


</div>
<!-- <div class="pt-10 grid grid-cols-7 items-center">
    <div class="col-span-2">
        <div class="border-1 p-8 shadow-lg bg-gray-50 opacity-80">

        <div class="flex items-center mb-4">
            <svg class="w-8 h-8 text-black mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#03CCFF" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h2 class="text-xl font-bold text-black uppercase">
                Click to Calm
            </h2>
        </div>

        <h3 class="text-xl text-black mb-6 border-b pb-4">
            Coming Soon!
        </h3>

        <p class="text-black mb-6 text-base">
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
    <div class="col-span-3">
        <div class="border-1 p-8 shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-[1.02] bg-white">

            <div class="flex items-center mb-4">
                <svg class="w-8 h-8 text-training mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#03CCFF" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <h2 class="text-2xl font-bold text-black uppercase">
                    The Predictable Path
                </h2>
            </div>

            <p class="text-black mb-6 border-b pb-4 text-base">
                This specialized <strong>in-person class</strong> uses the <strong>Course Circle</strong> technique—a highly predictable, repeating circuit of stations—to help your dog build focus, confidence, and calmness around triggers, transforming fear into engagement.
            </p>

            <ul class="list-disc list-inside space-y-2 text-black mb-8 text-sm">
                <li><strong>Builds Confidence:</strong> Uses repeating circuits for clear routines and environmental cues.</li>
                <li><strong>Reduces Reactivity:</strong> Transforms fear into focused engagement with predictability.</li>
                <li><strong>Essential Trust:</strong> Establishes clear routines, building independence and the handler/dog bond.</li>
            </ul>

            <div class="text-base font-bold text-black">
                Format: In-Person Class (Limestone Acres Dog Sports)
            </div>
            <div class="text-base font-bold text-black mb-8">
                Duration/Cost: Varies (See Schedule)
            </div>

            <a href="#class-registration"
                class="block w-full text-center bg-training text-white py-3 font-bold uppercase tracking-wider 
                  hover:bg-training-blue-hover focus:outline-none focus:ring-4 focus:ring-training focus:ring-opacity-50 transition duration-150 shadow-md">
                View Schedule & Register
            </a>

            <p class="mt-4 text-sm text-black text-center">
                Registration is required to attend.
            </p>

        </div>
    </div>
    <div class="col-span-2">
        <div class="border-1 p-8 shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-[1.02] bg-white">

            <div class="flex items-center mb-4">
                <svg class="w-8 h-8 text-training mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#03CCFF" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.65 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h2 class="text-xl font-bold text-black uppercase">
                    Private Training
                </h2>
            </div>

            <p class="text-black mb-6 border-b pb-4 text-base">
                Customized, <strong>one-on-one sessions</strong> for complex issues, sport goals, or obedience challenges.
            </p>

            <ul class="list-disc list-inside space-y-2 text-black mb-8 text-sm">
                <li><strong>Complex Issues:</strong> Aggression, anxiety, and fear-based reactivity.</li>
                <li><strong>Personalized Coaching:</strong> Advanced sport techniques.</li>
                <li><strong>Flexible Scheduling:</strong> Designed around your unique environment.</li>
            </ul>

            <div class="text-sm font-bold text-black">
                Format: In-Person / Virtual
            </div>
            <div class="text-sm font-bold text-black mb-8">
                Cost: Varies (Customized Packages)
            </div>

            <a href="#consultation-form"
                class="block w-full text-center bg-training text-white py-3 font-bold uppercase tracking-wider 
                  hover:bg-training-hover focus:outline-none focus:ring-4 focus:ring-training-blue focus:ring-opacity-50 transition duration-150 shadow-md text-sm">
                Request Consultation
            </a>

            <p class="mt-4 text-xs text-black text-center">
                Schedule a 15-minute introductory call.
            </p>

        </div>
    </div>
</div> -->

<!-- Begin Tier Two -->
 <div class="grid md:grid-cols-4 gap-8 mt-10 mb-10">
    <div></div>
    <div class="col-span-2 border-2 border-black p-8  bg-white">
        <h3 class="text-2xl font-extrabold text-black mb-4">Private Training</h3>
        <p class="text-sm text-black mb-3">
                Customized, <strong>one-on-one sessions</strong> for sports goals, or obedience challenges.
            </p>
            <p class="text-sm text-black mb-3">
                Our private coaching provides personalized instruction tailored to your specific goals, whether you are looking to sharpen advanced sport techniques or build a more reliable foundation for daily life. We offer focused coaching sessions and flexible scheduling designed to work specifically around your unique training environment, helping you and your teammate progress at your own pace.
            </p>
            <a href="{{ route('emails.history.create') }}"
                class="block w-full text-center bg-training text-white py-3 font-bold uppercase tracking-wider 
                  hover:bg-training-blue-hover focus:outline-none focus:ring-4 focus:ring-training focus:ring-opacity-50 transition duration-150">
                Schedule Your Free 15 Minute Intro Call
            </a>
    </div>
    <div></div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10 mb-10">

    <div class="md:col-span-1 border-2 border-black p-8  bg-white">
        <h3 class="text-2xl font-extrabold text-black mb-4">Official Titling & Testing</h3>
        
        <div class="mb-6 pb-4">
            <h4 class="text-lg font-bold text-black mb-1">Trick Dog Evaluations</h4>
            <p class="text-sm text-black mb-3">
                Earn recognized Trick Dog titles! Evaluations are available both <strong>online</strong> (via YouTube playlist submission) and <strong>in person</strong> (max ten tricks per title). Payment is only requested after a successful evaluation.
            </p>
            <p class="text-sm font-bold text-black">Cost: $10 per Title</p>
            <a href="#trick-dog-form" class="mt-2 inline-block text-training-blue-default font-semibold text-sm hover:underline">
                Submit Evaluation Request
            </a>
        </div>

        <!-- <div class="mb-0">
            <h4 class="text-lg font-bold text-black mb-1">Canine Good Citizen (CGC) Testing</h4>
            <p class="text-sm text-black mb-3">
                AKC CGC, CGCA, and CGCU Testing is held **every other month**. Registration is required in advance. Testing proceeds only if a minimum of six dogs are registered.
            </p>
            <p class="text-sm font-bold text-black">Cost: $10 per Test (In-Person Only)</p>
            <a href="#cgc-form" class="mt-2 inline-block text-training-blue-default font-semibold text-sm hover:underline">
                Register for Next Test Date
            </a>
        </div> -->
    </div>

    <div class="md:col-span-1 border-2 border-black p-8 bg-white">
        <h3 class="text-2xl font-extrabold text-black mb-4">Virtual & Community Programs</h3>

        <!-- <div class="mb-6 pb-4 border-b">
            <h4 class="text-lg font-bold text-black mb-1">Virtual Fit Dog</h4>
            <p class="text-sm text-black mb-3">
                Build conditioning and stamina from home! This **six-week virtual class** helps you and your dog meet distance requirements for official Fit Dog titles. Requires monthly Virtual Group Walk participation and video skill submission.
            </p>
            <p class="text-sm font-bold text-black">Duration: 6 Weeks | Cost: $50</p>
            <a href="#fit-dog-registration" class="mt-2 inline-block text-training-blue-default font-semibold text-sm hover:underline">
                Enroll in Virtual Class
            </a>
        </div> -->

        <div class="mb-0">
            <h4 class="text-lg font-bold text-black mb-1">The Wander Club (Hiking Meetup)</h4>
            <p class="text-sm text-black mb-3">
                Get active and social! Join us at pre-selected, dog-friendly hiking trails for a low-pressure community walk. A great way to build community and enjoy the outdoors.
            </p>
            <p class="text-sm font-bold text-black">Format: In-Person Drop-In | Cost: FREE</p>
            <a href="{{ route('events.index') }}" class="mt-2 inline-block text-training-blue-default font-semibold text-sm hover:underline">
                View Schedule & Trail Info
            </a>
        </div>
    </div>
</div>
 <!-- End Tier Two -->
@endsection