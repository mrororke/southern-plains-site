@extends('public-v2.layouts.app')


@section('hero')

{{-- Learn Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 gap-6 px-6 pt-8 pb-12 md:px-8 md:pt-12 md:pb-16">

    {{-- Intro --}}
    <div class="col-span-12 md:col-span-10">

        <p class="font-display font-bold text-2xl text-sp-burntClay">
            Dog Sports 101
        </p>

        <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">
            What is NASDA, Anyway?
        </h2>

        {{-- Article Metadata --}}
        <ul class="flex flex-wrap items-center gap-x-8 gap-y-3 mt-6 text-sp-slate">

            <li class="flex items-center gap-2">

                <x-icons.folder
                    class="w-5 h-5 shrink-0"
                    aria-hidden="true" />

                <span class="body-small">
                    Dog Sports 101
                </span>

            </li>

            <li class="flex items-center gap-2">

                <x-icons.clock
                    class="w-5 h-5 shrink-0"
                    aria-hidden="true" />

                <span class="body-small">
                    8 min read
                </span>

            </li>

            <li class="flex items-center gap-2">

                <x-icons.calendar-days
                    class="w-5 h-5 shrink-0"
                    aria-hidden="true" />

                <span class="body-small">
                    Last updated August 12th, 2026
                </span>

            </li>

        </ul>
        {{-- End Article Metadata --}}

        <p class="body text-sp-slate mt-4">
            The
            <a
                href="https://nasda.dog/"
                target="_blank"
                rel="noopener noreferrer"
                class="text-link">
                North American Sport Dog Association (NASDA)
            </a>
            offers scent-based dog sports designed to show off something dogs are already incredibly good at: using their noses.
        </p>

        <p class="body text-sp-slate mt-4">
            The games are based on historic working and competitive field activities and are designed to resemble real-life situations for dogs and their handlers. Purebred or mixed breed, young or old, experienced sport dog or complete beginner—NASDA gives dogs of all kinds an opportunity to search, problem-solve, and do what comes naturally.
        </p>

        <p class="body text-sp-slate mt-4">
            It’s also an incredibly beginner-friendly dog sport. You don’t need a long list of obedience titles, specialized equipment, or years of training before you can give it a try. Your dog doesn’t have to be perfect to come play.
        </p>

    </div>

</div>

@endsection


@section('content')

{{-- Guide Content --}}
<section class="grid grid-cols-12 gap-6 px-6 pb-16 md:px-8 md:pb-24">

    {{-- Guide --}}
    <div class="col-span-12 md:col-span-10 md:col-start-1">

        {{-- Guide Hero Image --}}
        <div class="mb-12 md:mb-16 relative">

            <img
                src="{{ asset('images/learn/what-is-nasda/featured.jpg') }}"
                alt="Hamish, a black and white Sheltie, investigating a NASDA quarry box outdoors."
                class="w-full aspect-[8/3] object-cover rounded-md">

            <x-public-v2.image-registration
                text="Hamish, Photo by Blue Ridge Creative"
                position="right"
                href="https://www.blueridgeprairie.studio/" />

        </div>
        {{-- End Guide Hero Image --}}

        {{-- Guide Body --}}
        <div class="grid grid-cols-10 items-stretch gap-6">

            {{-- Main Guide Content --}}
            <article class="col-span-10 md:col-span-7">

                {{-- Major Guide Section --}}
                <section id="the-games">

                    <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
                        What Can My Dog Actually Do?
                    </h2>

                    <p class="body text-sp-slate mt-4">
                        NASDA isn't a single game. There are several different ways for dogs to put their noses to work, and each asks them to solve a slightly different problem. You may find that your dog loves one and couldn't care less about another. That's part of the fun.
                    </p>

                    {{-- Subsection: Trailing & Locating --}}
                    <section class="mt-8">

                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal">
                            Trailing & Locating
                        </h3>

                        <p class="font-sans text-base font-semibold text-sp-charcoal mt-1">
                            Follow the trail. Find the quarry.
                        </p>

                        <p class="body text-sp-slate mt-2">
                            Trailing & Locating asks your dog to follow a scent trail to find hidden quarry at the end. At Level I, your dog has two minutes to make the find. But don't picture a dog following a perfect line with their nose glued to the ground. Dogs can work a scent trail in different ways. Your job is to give your dog room to work it out.
                        </p>

                    </section>

                    {{-- Subsection: Trailing Brace --}}
                    <section class="mt-8">

                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal">
                            Trailing Brace
                        </h3>

                        <p class="font-sans text-base font-semibold text-sp-charcoal mt-1">
                            Follow the trail. Find the quarry. Together.
                        </p>

                        <p class="body text-sp-slate mt-2">
                            Trailing Brace puts two dogs on the trail together. Both dogs work off leash, following a scent trail to locate the quarry. Each dog needs to make the find, so while they're working as a team, they're also being evaluated individually.
                        </p>

                    </section>

                    {{-- Subsection: Urban Locating --}}
                    <section class="mt-8">

                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal">
                            Urban Locating
                        </h3>

                        <p class="font-sans text-base font-semibold text-sp-charcoal mt-1">
                            Search the area. Find the quarry
                        </p>

                        <p class="body text-sp-slate mt-2">
                            Urban Locating takes away the scent trail. Instead, your dog searches a defined area to find hidden quarry. There's no required search pattern. Your dog doesn't have to methodically work from one side of the search area to the other. Give them room to investigate, follow scent, and work toward the source in their own way.
                        </p>

                    </section>

                    {{-- Subsection: Shed Dog --}}
                    <section class="mt-8">

                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal">
                            Shed Dog
                        </h3>

                        <p class="font-sans text-base font-semibold text-sp-charcoal mt-1">
                            Find the antler. That's it.
                        </p>

                        <p class="body text-sp-slate mt-2">
                            Shed Dog asks your dog to search an area and locate a naturally shed antler. And despite the name, your dog doesn't have to retrieve it. At Level I, your dog can indicate the shed or retrieve it. Either counts as locating the hide.
                        </p>

                    </section>

                    {{-- Subsection: Lost Item --}}
                    <section class="mt-8">

                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal">
                            Lost Item
                        </h3>

                        <p class="font-sans text-base font-semibold text-sp-charcoal mt-1">
                            Your scent. Their Search
                        </p>

                        <p class="body text-sp-slate mt-2">
                            Lost Item asks your dog to search for an everyday object carrying your scent. You provide the items your dog will search for, and one is selected for the search. It's a different challenge from searching for quarry or an antler: this time, what matters is something that smells like you.
                        </p>

                    </section>

                    {{-- Subsection: Den Hunt --}}
                    <section class="mt-8">

                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal">
                            Den Hunt
                        </h3>

                        <p class="font-sans text-base font-semibold text-sp-charcoal mt-1">
                            Enter the tunnel. Find the quarry.
                        </p>

                        <p class="body text-sp-slate mt-2">
                            Den Hunt asks the dog to enter a tunnel and travel through it to locate quarry. The introductory level, Den Hunt Tested, uses a straight tunnel and is pass/fail. The dog must enter independently, reach the quarry, and remain there for the required amount of time.
                        </p>

                    </section>

                    {{-- Development Callout --}}
                    <div class="mt-8 rounded-md border border-sp-warmStone bg-sp-limestone p-5 md:p-6">

                        <div class="flex items-start gap-4">

                            <x-icons.notebook-dot
                                class="mt-0.5 h-6 w-6 shrink-0 text-sp-prairieOchre"
                                aria-hidden="true" />

                            <div>

                                <h3 class="font-sans text-xl font-semibold text-sp-charcoal">
                                    Still In Development
                                </h3>

                                <p class="body text-sp-slate mt-4">
                                    Den Hunt is currently still in development. The rules and requirements are still being field tested, and adjusted.
                                </p>

                            </div>

                        </div>

                    </div>
                    {{-- End Development Callout --}}


                </section>

                {{-- Major Guide Section --}}
                <section
                    id="training"
                    class="mt-16">

                    <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
                        Does My Dog Need Special Training?
                    </h2>

                    <p class="body text-sp-slate mt-4">
                        One of the great things about NASDA is that it's beginner-friendly for both the handler
                        and the dog. Most dogs already like smelling new and interesting things. That makes those
                        first finds fairly easy for a lot of dogs. The dog isn't really learning how to smell—they've
                        had that figured out their entire life. They're learning what this particular game is asking them to find.
                    </p>

                    <p class="body text-sp-slate mt-4">
                        I like to say that at Level I, the dog is learning the game. At Level II, the handler is learning the game. By Level III, it's all about teamwork.
                    </p>

                    <p class="body text-sp-slate mt-4">
                        Your dog doesn't need to know what they're doing yet.<br />
                        Neither do you.
                    </p>

                    <p class="body text-sp-slate mt-4">
                        At Level I, you don't even need to recognize or call your dog's alert. The judge is watching your dog work and will make the call when your dog independently locates the source.

                    </p>

                    <p class="body text-sp-slate mt-4">
                        <span class="italic">What you can start learning is how your individual dog communicates.</span><br />
                        Maybe it's a sudden head snap or an ear twitch. Maybe their sniffing becomes more intense. Their speed changes. Their body changes. Their tail starts moving differently. Every dog communicates differently. There isn't one behavior every NASDA dog needs to perform when they've found something. <span class="italic">That's part of learning to TRAIN the dog in front of you.</span>
                    </p>

                    <p class="body text-sp-slate mt-4">
                        You don't need much equipment to get started, either. As a competitor, you can have a great trial day with your dog, an appropriate collar or harness, and a leash. Add a pair of shoes appropriate for the trial site and something your dog finds rewarding, and you're ready to go.
                    </p>

                </section>


                {{-- Major Guide Section --}}
                <section
                    id="your-first-trial"
                    class="mt-16">

                    <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
                        What happens at a NASDA Trial?
                    </h2>

                    <p class="body text-sp-slate mt-4">
                        Your first trial can seem complicated from the outside. Once you're there, the basic process is pretty simple:
                    </p>

                    {{-- Trial Process --}}
                    <div class="grid grid-cols-1 gap-4 mt-8 md:grid-cols-5">

                        <div class="rounded-md bg-sp-limestone p-5">
                            <h3 class="font-sans text-lg font-semibold text-sp-charcoal">
                                Check In
                            </h3>

                            <p class="body-small text-sp-slate mt-4">
                                Let the trial secretary know you’ve arrived.
                            </p>
                        </div>

                        <div class="rounded-md bg-sp-limestone p-5">
                            <h3 class="font-sans text-lg font-semibold text-sp-charcoal">
                                Attend the Briefing
                            </h3>

                            <p class="body-small text-sp-slate mt-4">
                                Before the class starts, the judge will explain the course and answer questions.
                            </p>
                        </div>

                        <div class="rounded-md bg-sp-limestone p-5">
                            <h3 class="font-sans text-lg font-semibold text-sp-charcoal">
                                Wait Your Turn
                            </h3>

                            <p class="body-small text-sp-slate mt-4">
                                Keep yourself and your dog comfortable until your class/turn.
                            </p>
                        </div>

                        <div class="rounded-md bg-sp-limestone p-5">
                            <h3 class="font-sans text-lg font-semibold text-sp-charcoal">
                                Let Your Dog Search
                            </h3>

                            <p class="body-small text-sp-slate mt-4">
                                Enter the start cones and give your dog room to work. The judge will make the call.
                            </p>
                        </div>

                        <div class="rounded-md bg-sp-limestone p-5">
                            <h3 class="font-sans text-lg font-semibold text-sp-charcoal">
                                Celebrate!
                            </h3>

                            <p class="body-small text-sp-slate mt-4">
                                Reinforce at source when permitted, leave the search area, and tell your dog how great they are!
                            </p>
                        </div>

                    </div>
                    {{-- End Trial Process --}}

                    <p class="body text-sp-slate mt-4">
                        At check-in, you'll let the trial secretary know you've arrived. Before the class begins, the judge will explain the course and answer questions. Then you wait with your dog until it's your turn. When you're called, you take your dog to the start line and let them do the important part: search. That's really not so different from practice.
                    </p>

                    <p class="body text-sp-slate mt-4">
                        <span class="font-bold">What's a run?</span><br />
                        A run begins when your dog crosses the start line, which is marked by two cones. NASDA trials can run concurrently. If an event is holding three trials, for example, you may run Trial One, Trial Two, and Trial Three back to back.
                    </p>

                    <p class="body text-sp-slate mt-4">
                        That can sound confusing when you're new.<br />
                        Instead of running once, waiting for the rest of the class, running again, waiting again, and finally running a third time, your dog completes those runs one after another. If your dog is only entered in one event, you may be finished once those runs are complete.
                    </p>

                    <p class="body text-sp-slate mt-4">
                        <span class="font-bold">What does the judge do?</span><br />
                        The judge evaluates your team's run.<br />
                        They're watching how your dog is working and how you respond to your dog's body language. A judge is also watching for the difference between a dog working odor and a dog who has simply found something interesting to sniff.<br />
                        You don't have to call the find. The judge makes the call.
                    </p>

                    <p class="body text-sp-slate mt-4">
                        <span class="font-bold">What does the handler do?</span><br />
                        Your main job is to support your dog.<br />
                        Sometimes that means encouraging a dog who's unsure whether they can approach an area. Sometimes it's helping a dog build the confidence to approach a quarry cage. You're also responsible for managing your equipment and yourself without simply leading your dog to the hide. <span class="italic">Give your dog room to solve the problem.</span>
                    </p>

                    <p class="body text-sp-slate mt-4">
                        <span class="font-bold">What is the dog expected to do?</span><br />
                        Mainly? <span class="italic">The dog should be a dog.</span>
                        Your dog should be interested in exploring their environment and investigating interesting smells. At Level I, this is where a lot of dogs begin learning the game. What gets reinforced gets repeated. It usually doesn't take dogs long to figure out that finding what we're looking for results in praise—and sometimes cookies.

                    </p>

                    <p class="body text-sp-slate mt-4">
                        <span class="font-bold">What happens while we're waiting?</span><br />
                        Trial days can involve quite a bit of waiting. How much depends on the number of entries, the size of the search areas, the weather, and plenty of other variables. Make sure your dog has a comfortable place to rest.<br />
                        Then talk to people. Watch other dogs run when you're permitted to. Ask questions. Volunteer to help with course setup or breakdown.
                        Many hands make light work, and trials move much more smoothly when everyone pitches in.
                    </p>

                </section>

                {{-- Major Guide Section --}}
                <section
                    id="scoring-levels"
                    class="mt-16">

                    <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
                        How do Scoring, Levels, & Titles Work?
                    </h2>

                    {{-- Scoring & Titles --}}
                    <div class="grid grid-cols-1 gap-4 mt-8 md:grid-cols-2">

                        <div class="rounded-md bg-sp-limestone p-5">
                            <h3 class="font-sans text-lg font-semibold text-sp-charcoal">
                                Puppy Aptitude Test
                            </h3>

                            <p class="body-small text-sp-slate mt-4">
                                Depending on your dog's age, you may be able to start with the optional Puppy Aptitude Test. This is a pass/fail course that allows the judge to assess whether the puppy can independently identify the hide.
                            </p>
                        </div>

                        <div class="rounded-md bg-sp-limestone p-5">
                            <h3 class="font-sans text-lg font-semibold text-sp-charcoal">
                                Level I
                            </h3>

                            <p class="body-small text-sp-slate mt-4">
                                This is where most beginners start.<br />
                                The dog should work the search independently rather than simply following handler movement. A Level I title is earned after accumulating 100 Level I points.
                            </p>
                        </div>

                        <div class="rounded-md bg-sp-limestone p-5">
                            <h3 class="font-sans text-lg font-semibold text-sp-charcoal">
                                Level II
                            </h3>

                            <p class="body-small text-sp-slate mt-4">
                                At Level II, the searches become more challenging. Hides can be covered or partially inaccessible and may be elevated.
                                A Level II title is earned after accumulating 400 Level II points.
                            </p>
                        </div>

                        <div class="rounded-md bg-sp-limestone p-5">
                            <h3 class="font-sans text-lg font-semibold text-sp-charcoal">
                                Level 3 & Beyond
                            </h3>

                            <p class="body-small text-sp-slate mt-4">
                                Level III introduces significantly more difficult searches.
                                These classes are blind: handlers don't know where the hide is located, can't watch other teams run before their own search, and enter knowing the course boundaries but not where the search will lead them.
                            </p>
                        </div>

                    </div>
                    {{-- End Scoring & Titles --}}

                    <p class="body text-sp-slate mt-4">
                        And there is still somewhere to go from there. NASDA offers additional advanced and championship titles, along with versatility titles for dogs competing across events. This guide isn't going to turn into a rulebook, though. Learn more about
                        <a
                            href="https://nasda.dog/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="text-link">
                            NASDA titles, points and current requirements.
                        </a>
                    </p>

                </section>

                {{-- Major Guide Section --}}
                <section
                    id="what-to-expect"
                    class="mt-16">

                    <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
                        What to Expect
                    </h2>

                    <p class="body text-sp-slate mt-4">
                        Placeholder content for this section of the guide.
                    </p>

                </section>

                {{-- Major Guide Section --}}
                <section
                    id="what-to-bring"
                    class="mt-16">

                    <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
                        What to Bring
                    </h2>

                    <p class="body text-sp-slate mt-4">
                        Placeholder content for this section of the guide.
                    </p>

                </section>

                {{-- Major Guide Section --}}
                <section
                    id="getting-started"
                    class="mt-16">

                    <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
                        Getting Started
                    </h2>

                    <p class="body text-sp-slate mt-4">
                        Placeholder content for this section of the guide.
                    </p>

                </section>

                <section>
                    CTA: Request a Workshop
                </section>

            </article>

            {{-- Supporting Figures --}}
            <aside class="col-span-10 self-start md:col-span-3">

                <figure>

                    <img
                        src="{{ asset('images/learn/what-is-nasda/trailing-and-locating.jpg') }}"
                        alt="Hamish, a black and white Sheltie, investigating a NASDA quarry box while searching for quarry."
                        class="block w-full aspect-[4/3] object-cover rounded-md">

                    <figcaption class="mt-3">

                        <p class="font-display text-sm text-sp-prairieOchre uppercase">
                            Figure 01
                        </p>

                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal mt-1">
                            Trailing & Locating Level One
                        </h3>

                        <p class="body text-sp-slate mt-2">
                            Hamish at a quarry box, successfully finding a rat.
                        </p>

                        <p class="body-small text-sp-slate mt-2">
                            Photo: <a href="https://www.blueridgeprairie.studio/"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="text-link">Blue Ridge Creative</a>
                        </p>

                    </figcaption>

                </figure>

                <figure class="mt-10">

                    <img
                        src="{{ asset('images/learn/what-is-nasda/trailing-brace.jpg') }}"
                        alt="Two dogs searching through leaves and brush during a NASDA scent sport exercise."
                        class="block w-full aspect-[4/3] object-cover rounded-md">

                    <figcaption class="mt-3">

                        <p class="font-display text-sm text-sp-prairieOchre uppercase">
                            Figure 02
                        </p>

                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal mt-1">
                            Trailing Brace Level I
                        </h3>

                        <p class="body text-sp-slate mt-2">
                            Hamish and his first ever Brace partner, River.
                        </p>

                        <p class="body-small text-sp-slate mt-2">
                            Photo: <a href="https://www.blueridgeprairie.studio/"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="text-link">Blue Ridge Creative</a>
                        </p>

                    </figcaption>

                </figure>

                <figure class="mt-10">

                    <img
                        src="{{ asset('images/learn/what-is-nasda/urban-locating.jpg') }}"
                        alt="Hamish, a black and white Sheltie, standing in a barn after locating hidden quarry."
                        class="block w-full aspect-[4/3] object-cover rounded-md">

                    <figcaption class="mt-3">

                        <p class="font-display text-sm text-sp-prairieOchre uppercase">
                            Figure 03
                        </p>

                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal mt-1">
                            Urban Locating Level I
                        </h3>

                        <p class="body text-sp-slate mt-2">
                            Hamish after finding a rat hidden in a barn.
                        </p>

                        <p class="body-small text-sp-slate mt-2">
                            Photo: <a href="https://www.blueridgeprairie.studio/"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="text-link">Blue Ridge Creative</a>
                        </p>

                    </figcaption>

                </figure>

                <figure class="mt-10">

                    <img
                        src="{{ asset('images/learn/what-is-nasda/shed-dog.jpg') }}"
                        alt="A black and white Sheltie sniffing the ground toward a shed deer antler."
                        class="block w-full aspect-[4/3] object-cover rounded-md">

                    <figcaption class="mt-3">

                        <p class="font-display text-sm text-sp-prairieOchre uppercase">
                            Figure 04
                        </p>

                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal mt-1">
                            Shed Level I
                        </h3>

                        <p class="body text-sp-slate mt-2">
                            Hamish confidently going to the antler.
                        </p>

                        <p class="body-small text-sp-slate mt-2">
                            Photo: <a href="https://www.blueridgeprairie.studio/"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="text-link">Blue Ridge Creative</a>
                        </p>

                    </figcaption>

                </figure>
                <figure class="mt-10">

                    <img
                        src="{{ asset('images/learn/what-is-nasda/lost-item.jpg') }}"
                        alt="A black and white Sheltie sniffing near a set of car keys on the ground outdoors."
                        class="block w-full aspect-[4/3] object-cover rounded-md">

                    <figcaption class="mt-3">

                        <p class="font-display text-sm text-sp-prairieOchre uppercase">
                            Figure 05
                        </p>

                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal mt-1">
                            Lost Item Level I
                        </h3>

                        <p class="body text-sp-slate mt-2">
                            Hamish finding the car keys.
                        </p>

                        <p class="body-small text-sp-slate mt-2">
                            Photo: <a href="https://www.blueridgeprairie.studio/"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="text-link">Blue Ridge Creative</a>
                        </p>

                    </figcaption>

                </figure>

                <figure class="mt-10">

                    <img
                        src="{{ asset('images/learn/what-is-nasda/natural-distractions.jpg') }}"
                        alt="A black and white Sheltie eating horse manure."
                        class="block w-full aspect-[4/3] object-cover rounded-md">

                    <figcaption class="mt-3">

                        <p class="font-display text-sm text-sp-prairieOchre uppercase">
                            Figure 06
                        </p>

                        <h3 class="font-sans text-xl font-semibold text-sp-charcoal mt-1">
                            Natural Distractions - Yuck!
                        </h3>

                        <p class="body text-sp-slate mt-2">
                            Hamish enjoying a mid run “snack.”
                        </p>

                        <p class="body-small text-sp-slate mt-2">
                            Photo: <a href="https://www.blueridgeprairie.studio/"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="text-link">Blue Ridge Creative</a>
                        </p>

                    </figcaption>

                </figure>

            </aside>

        </div>
        {{-- End Guide Body --}}



    </div>


    {{-- Guide Navigation --}}
    <aside
        class="hidden md:col-span-2 md:col-start-11 md:block md:self-start md:sticky md:top-8 md:border-l md:border-sp-warmStone md:pl-6"
        aria-label="Guide navigation">

        <nav>

            <p class="font-display font-bold text-2xl text-sp-prairieGreen uppercase">
                In This Guide
            </p>

            <ul class="flex flex-col gap-4 mt-2">

                <li>
                    <a
                        href="#the-games"
                        data-guide-nav
                        class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                        The Games
                    </a>
                </li>

                <li>
                    <a
                        href="#training"
                        data-guide-nav
                        class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                        Training
                    </a>
                </li>

                <li>
                    <a
                        href="#your-first-trial"
                        data-guide-nav
                        class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                        Your First Trial
                    </a>
                </li>

                <li>
                    <a
                        href="#scoring-levels"
                        data-guide-nav
                        class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                        Scoring &amp; Levels
                    </a>
                </li>

                <li>
                    <a
                        href="#what-to-expect"
                        data-guide-nav
                        class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                        What to Expect
                    </a>
                </li>

                <li>
                    <a
                        href="#what-to-bring"
                        data-guide-nav
                        class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                        What to Bring
                    </a>
                </li>

                <li>
                    <a
                        href="#getting-started"
                        data-guide-nav
                        class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                        Getting Started
                    </a>
                </li>

            </ul>

        </nav>

    </aside>
    {{-- End Guide Navigation --}}

</section>
{{-- End Guide Content --}}

@endsection


<script>
    document.addEventListener('DOMContentLoaded', () => {

        const navLinks = document.querySelectorAll('[data-guide-nav]');

        if (!navLinks.length) {
            return;
        }

        const guideSections = Array.from(navLinks)
            .map(link => document.querySelector(link.getAttribute('href')))
            .filter(Boolean);

        if (!guideSections.length) {
            return;
        }

        const setActiveSection = (id) => {

            navLinks.forEach(link => {

                const isActive = link.getAttribute('href') === `#${id}`;

                link.classList.toggle('is-active', isActive);

                if (isActive) {
                    link.setAttribute('aria-current', 'location');
                } else {
                    link.removeAttribute('aria-current');
                }

            });

        };

        const observer = new IntersectionObserver(
            (entries) => {

                const visibleSections = entries
                    .filter(entry => entry.isIntersecting)
                    .sort(
                        (a, b) =>
                        a.boundingClientRect.top - b.boundingClientRect.top
                    );

                if (visibleSections.length) {
                    setActiveSection(visibleSections[0].target.id);
                }

            }, {
                rootMargin: '-20% 0px -65% 0px',
                threshold: 0
            }
        );

        guideSections.forEach(section => {
            observer.observe(section);
        });

    });
</script>