@extends('public-v2.layouts.app')

@section('content')

{{-- Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 pt-8">
    <div class="col-span-12 mt-8 md:col-span-6 md:mt-0 relative">

        <img
            class="w-full h-full"
            src="{{ asset('images/headers/header-training.png') }}"
            alt="Black and white Sheltie standing near a deer antler, looking up at his handler.">

        <x-public-v2.image-registration
            text="Hamish, Photo by Blue Ridge Creative"
            position="left"
            href="https://www.blueridgeprairie.studio/" />
    </div>

    <div class="col-span-12 px-6 pt-8 md:col-span-6 md:pt-0 md:pl-8 md:pr-0">

    <p class="text-eyebrow">
        Southern Plains Training
    </p>

    <h1 class="text-4xl sm:text-5xl md:text-hero font-sans font-semibold text-sp-charcoal leading-[1.05]">
        Training Should Feel Good on Both Ends of the Leash
    </h1>

    <div class="hl-break">
        <hr>
    </div>

    <p class="body-large">
        Positive reinforcement, clear communication, and plenty of room to have fun. Southern Plains helps you build skills with the dog in front of you—without force, intimidation, or physical correction.
    </p>

    <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 py-6">

        <a
            href="#possibilities"
            class="btn-primary">
            Explore Training Options
        </a>

        <a
            href="{{ route('public-v2.about') }}"
            class="btn-primary-outline">
            Meet Melanie
        </a>

    </div>

</div>
</div>
{{-- End Hero --}}

{{-- Train Differently --}}
<section class="grid grid-cols-12 px-6 py-12 md:px-8 md:py-16">

    {{-- Empty Column --}}
    <div class="hidden md:block md:col-span-1"></div>

    {{-- Icon --}}
    <div class="col-span-12 md:col-span-1">
        <x-icons.mouse-pointer-click
            class="w-10 h-10 md:w-12 md:h-12 text-sp-prairieGreen" />
    </div>

    {{-- Left Text Area --}}
    <div class="col-span-12 mt-3 md:col-span-4 md:mt-0">

        <p class="font-display font-bold text-2xl text-sp-burntClay">
            Train Differently
        </p>

        <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
            No Prongs. No Shock.<br class="hidden md:block">
            No Forcing the Issue.
        </h2>

        <p class="body mt-4">
            Southern Plains uses positive reinforcement and marker-based training to help dogs understand what we’re asking of them. Clickers are encouraged. Choice matters. And training should build confidence—not make your dog worry about what happens when they get it wrong.
        </p>

    </div>

    {{-- Divider --}}
    <div class="hidden md:flex md:col-span-1 justify-center">
        <div class="border-l border-sp-warmStone h-full"></div>
    </div>

    {{-- Right Benefits Area --}}
    <div class="col-span-12 flex flex-col gap-6 mt-8 md:col-span-4 md:mt-0">

        {{-- Benefit --}}
        <div class="flex gap-4 md:gap-6">

            <x-icons.message-circle-more
                class="w-8 h-8 md:w-10 md:h-10 shrink-0 text-sp-prairieOchre" />

            <div>
                <h3 class="font-sans font-semibold text-sp-charcoal">
                    Communicate Clearly
                </h3>

                <p class="body">
                    Make it easy for your dog to understand what earns reinforcement.
                </p>
            </div>

        </div>

        {{-- Benefit --}}
        <div class="flex gap-4 md:gap-6">

            <x-icons.shield-check
                class="w-8 h-8 md:w-10 md:h-10 shrink-0 text-sp-prairieOchre" />

            <div>
                <h3 class="font-sans font-semibold text-sp-charcoal">
                    Build Confidence
                </h3>

                <p class="body">
                    Help dogs feel confident enough to try, to think, and to participate.
                </p>
            </div>

        </div>

        {{-- Benefit --}}
        <div class="flex gap-4 md:gap-6">

            <x-icons.heart
                class="w-8 h-8 md:w-10 md:h-10 shrink-0 text-sp-prairieOchre" />

            <div>
                <h3 class="font-sans font-semibold text-sp-charcoal">
                    Have Some Fun
                </h3>

                <p class="body">
                    Because the whole point is getting to do more with your dog.
                </p>
            </div>

        </div>

    </div>

    {{-- Empty Column --}}
    <div class="hidden md:block md:col-span-1"></div>

</section>
{{-- End Train Differently --}}

{{-- What Do You Want to Do --}}
<section
    id="possibilities"
    class="grid grid-cols-12 px-6 py-12 md:px-8 md:py-16 bg-sp-limestone">

    {{-- Section Intro --}}
    <div class="col-span-12 mb-8 md:mb-12">

        <p class="font-display font-bold text-2xl text-sp-burntClay">
            What Do You Want to Do With Your Dog?
        </p>

        <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
            Find the Right Path for You
        </h2>

    </div>

    {{-- Cards --}}
    <div class="col-span-12 grid grid-cols-1 md:grid-cols-4 gap-10 md:gap-6">

        {{-- Card One --}}
        <div class="flex flex-col h-full">

            {{-- Card Image --}}
            <div class="relative">

                <img
                    class="w-full h-64 object-cover rounded-md"
                    src="{{ asset('images/training/training-skills.png') }}"
                    alt="Black and white Sheltie looking up at his handler, who is showing empty hands.">

                <x-public-v2.image-registration
                    text="Hamish, Photo by Blue Ridge Creative"
                    position="bottom"
                    compact
                    href="https://www.blueridgeprairie.studio/" />

            </div>

            <h3 class="font-sans font-semibold text-xl text-sp-charcoal mt-4">
                Build Everyday Skills
            </h3>

            <p class="body mt-3">
                Manners, communication, CGC preparation, and stronger foundations for real life.
            </p>

            <a
                href="#"
                class="learn-more-link text-sp-prairieGreen mt-auto pt-4">
                Learn More
                <x-icons.move-right />
            </a>

        </div>

        {{-- Card Two --}}
        <div class="flex flex-col h-full">

            {{-- Card Image --}}
            <div class="relative">

                <img
                    class="w-full h-64 object-cover rounded-md"
                    src="{{ asset('images/training/training-new.png') }}"
                    alt="Black and white Sheltie standing between his handler's legs and looking up at her as she smiles down at him.">

                <x-public-v2.image-registration
                    text="Hamish, Photo by Odd Paw Studio"
                    position="bottom"
                    compact
                    href="https://www.oddpawstudio.com/" />

            </div>

            <h3 class="font-sans font-semibold text-xl text-sp-charcoal mt-4">
                Learn Something New
            </h3>

            <p class="body mt-3">
                Tricks, workshops, specialty classes, and opportunities to explore new skills.
            </p>

            <a
                href="#"
                class="learn-more-link text-sp-prairieGreen mt-auto pt-4">
                Learn More
                <x-icons.move-right />
            </a>

        </div>

        {{-- Card Three --}}
        <div class="flex flex-col h-full">

            {{-- Card Image --}}
            <div class="relative">

                <img
                    class="w-full h-64 object-cover rounded-md"
                    src="{{ asset('images/training/training-compete.png') }}"
                    alt="Black and white Sheltie looking attentively toward his handler in a training environment.">

                <x-public-v2.image-registration
                    text="Hamish, Photo by Blue Ridge Creative"
                    position="bottom"
                    compact
                    href="https://www.blueridgeprairie.studio/" />

            </div>

            <h3 class="font-sans font-semibold text-xl text-sp-charcoal mt-4">
                Get Ready to Compete
            </h3>

            <p class="body mt-3">
                Develop the skills and teamwork you'll need for dog sports and trial environments.
            </p>

            <a
                href="#"
                class="learn-more-link text-sp-prairieGreen mt-auto pt-4">
                Learn More
                <x-icons.move-right />
            </a>

        </div>

        {{-- Card Four --}}
        <div class="flex flex-col h-full">

            {{-- Card Image --}}
            <div class="relative">

                <img
                    class="w-full h-64 object-cover rounded-md"
                    src="{{ asset('images/training/training-work.png') }}"
                    alt="Black and white Sheltie trotting toward the camera.">

                <x-public-v2.image-registration
                    text="Hamish, Photo by Blue Ridge Creative"
                    position="bottom"
                    compact
                    href="https://www.blueridgeprairie.studio/" />

            </div>

            <h3 class="font-sans font-semibold text-xl text-sp-charcoal mt-4">
                Work Through Something
            </h3>

            <p class="body mt-3">
                Private instruction for teams that need more individualized support and guidance.
            </p>

            <a
                href="#"
                class="learn-more-link text-sp-prairieGreen mt-auto pt-4">
                Learn More
                <x-icons.move-right />
            </a>

        </div>

    </div>

</section>
{{-- End What Do You Want to Do --}}

{{-- Current Opportunities --}}
<section
    class="grid grid-cols-12 gap-6 px-6 py-12 md:px-8 md:py-16 bg-sp-prairieGreen/45">

    {{-- Section Intro --}}
    <div class="col-span-12 mb-2 md:mb-6">

        <p class="font-display font-bold text-2xl text-sp-burntClay">
            Ready to Train?
        </p>

        <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
            Current Opportunities
        </h2>

    </div>

    {{-- Sample Opportunity --}}
    <div class="col-span-12 md:col-span-3 bg-sp-warmIvory rounded-md p-6">

        <div class="flex gap-4 md:gap-6">

            {{-- Temporary icon --}}
            <div class="shrink-0">
                <x-icons.calendar-days
                    class="w-8 h-8 md:w-10 md:h-10 text-sp-prairieGreen" />
            </div>

            <div>

                <h3 class="font-sans font-semibold text-xl text-sp-charcoal">
                    Communicate Clearly
                </h3>

                <p class="body mt-3">
                    Make it easy for your dog to understand what earns reinforcement.
                </p>

                <a
                    href="#"
                    class="learn-more-link text-sp-prairieGreen mt-4">
                    View Classes
                    <x-icons.move-right />
                </a>

            </div>

        </div>

    </div>

    {{-- Reserved Space for Dynamic Opportunities --}}
    <div class="hidden md:block md:col-span-6"></div>

    {{-- Empty State --}}
    <div class="col-span-12 md:col-span-3 flex items-center mt-4 pt-8 border-t border-sp-prairieGreen/30 md:mt-0 md:pt-0 md:border-t-0">

        <div>

            <x-icons.bone
                class="w-8 h-8 md:w-10 md:h-10 text-sp-prairieGreen mb-4 md:mb-6" />

            <p class="body">
                Nothing scheduled right now — but we’re always working on what’s next.
            </p>

            <a
                href="#newsletter"
                class="learn-more-link text-sp-prairieGreen mt-4">
                Join the Newsletter to Stay in the Loop
                <x-icons.move-right />
            </a>

        </div>

    </div>

</section>
{{-- End Current Opportunities --}}

{{-- AKC Trick Dog --}}
<section class="grid grid-cols-12 gap-8 px-6 py-12 md:px-8 md:py-16 bg-sp-warmIvory">

    {{-- Image --}}
    <div class="col-span-12 md:col-span-4">

        <div class="relative">

            <img
                class="w-full h-64 md:h-full object-cover rounded-md"
                src="{{ asset('images/training/training-trick-dog.png') }}"
                alt="Melanie working with Hamish, a black and white Sheltie, during a training session.">

            <x-public-v2.image-registration
                text="Hamish, Photo by Blue Ridge Creative"
                position="bottom"
                compact
                href="https://www.blueridgeprairie.studio/" />

        </div>

    </div>

    {{-- Main Content --}}
    <div class="col-span-12 md:col-span-5 flex items-center">

        <div class="w-full">

            <p class="font-display font-bold text-2xl text-sp-burntClay">
                AKC Trick Dog
            </p>

            <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">
                Already Have the Tricks?<br>
                Get the Title.
            </h2>

            <p class="body-large mt-4">
                As an AKC CGC Evaluator, Melanie offers AKC Trick Dog evaluations online or in person. Earn titles that celebrate what your dog already knows — and open the door to even more fun.
            </p>

            <a
                href="#"
                class="btn-primary w-full md:w-auto mt-6">
                Request an Evaluation
            </a>

        </div>

    </div>

    {{-- Evaluation Details --}}
    <div class="col-span-12 md:col-span-3 border-t md:border-t-0 md:border-l border-sp-warmStone pt-8 md:pt-0 md:pl-8 flex items-center">

        <ul class="flex flex-col gap-6">

            <li class="flex items-center gap-4">

                <x-icons.circle-check-big
                    class="w-8 h-8 shrink-0 text-sp-prairieGreen" />

                <span class="body">
                    All levels: Novice, Intermediate, Advanced, Performer and Performer Elite.
                </span>

            </li>

            <li class="flex items-center gap-4">

                <x-icons.circle-check-big
                    class="w-8 h-8 shrink-0 text-sp-prairieGreen" />

                <span class="body">
                    Evaluation online or by appointment.
                </span>

            </li>

            <li class="flex items-center gap-4">

                <x-icons.circle-check-big
                    class="w-8 h-8 shrink-0 text-sp-prairieGreen" />

                <span class="body">
                    Open to all dogs.
                </span>

            </li>

            <li class="flex items-center gap-4">

                <x-icons.circle-check-big
                    class="w-8 h-8 shrink-0 text-sp-prairieGreen" />

                <span class="body">
                    Great goal for any team!
                </span>

            </li>

        </ul>

    </div>

</section>
{{-- End AKC Trick Dog --}}


{{-- Experience Behind the Clicker --}}
<section class="grid grid-cols-12 gap-8 px-6 py-12 md:px-8 md:py-[88px] bg-sp-warmIvory">

    {{-- Intro --}}
    <div class="col-span-12 md:col-span-5">

        <p class="font-display font-bold text-2xl text-sp-burntClay">
            Train With Confidence
        </p>

        <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">
            Experience Behind the Clicker.
        </h2>

        <p class="body mt-4">
            Melanie brings years of hands-on training, teaching, and competing to every team she works with — always using positive methods.
        </p>

    </div>

    {{-- Credentials --}}
    <div class="col-span-12 md:col-span-5 grid grid-cols-2 md:grid-cols-4">

        {{-- AKC CGC Evaluator --}}
        <div class="p-6 border-r border-b md:border-b-0 border-sp-warmStone text-center md:pt-0 md:pb-0 md:pl-0 md:pr-6">

            <x-icons.clipboard-check
                class="w-8 h-8 text-sp-charcoal mb-4 mx-auto" />

            <p class="body-small">
                AKC CGC<br>
                Evaluator
            </p>

        </div>

        {{-- AKC Fit Dog Instructor --}}
        <div class="p-6 border-b md:border-b-0 md:border-r border-sp-warmStone text-center">

            <x-icons.activity
                class="w-8 h-8 text-sp-charcoal mb-4 mx-auto" />

            <p class="body-small">
                AKC Fit Dog<br>
                Instructor
            </p>

        </div>

        {{-- Click to Calm --}}
        <div class="p-6 border-r border-sp-warmStone text-center md:py-0">

            <x-icons.graduation-cap
                class="w-8 h-8 text-sp-charcoal mb-4 mx-auto" />

            <p class="body-small">
                Click to Calm<br>
                Instructor<br>
                In Progress
            </p>

        </div>

        {{-- NASDA Judge --}}
        <div class="p-6 text-center md:pt-0 md:pb-0 md:pr-0">

            <x-icons.badge-check
                class="w-8 h-8 text-sp-charcoal mb-4 mx-auto" />

            <p class="body-small">
                NASDA<br>
                Judge
            </p>

        </div>

    </div>

    {{-- About CTA --}}
    <div class="col-span-12 md:col-span-2 flex items-center">

        <a
            href="{{ route('public-v2.about') }}"
            class="btn-primary-outline w-full">
            Meet Melanie
        </a>

    </div>

</section>
{{-- End Experience Behind the Clicker --}}



</div>


@endsection