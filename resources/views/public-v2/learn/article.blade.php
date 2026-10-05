@extends('public-v2.layouts.app')


@section('hero')

{{-- Learn Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 gap-6 px-6 pt-8 pb-12 md:px-8 md:pt-12 md:pb-16">

    {{-- Intro --}}
    <div class="col-span-12 md:col-span-10">

        <p class="font-display font-bold text-2xl text-sp-burntClay">
            Handler Insights
        </p>

        <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">
            The Legacy of Luka
        </h2>

        {{-- Article Metadata --}}
        <x-public-v2.article-metadata
            category="Handler Insights"
            read-time="8 min read"
            updated="Last updated January 19th, 2026" />
        {{-- End Article Metadata --}}

        <p class="body text-sp-slate mt-4">
            To get to the story of Hamish, I have to finish the story of Luka, and mentally and emotionally, I haven’t been ready. I think that maybe now I am, though. I’m going to try anyway.
        </p>

        <p class="body text-sp-slate mt-4">
            On July 8th, Luka woke me up around 5:00am to go to the bathroom. Instead of all but dragging me through the house, he walked very slowly. I knew right away he wasn’t feeling great. He went out, and did his business, then we came back inside. When I took off his harness and leash, I assessed him. Everything about his body position told me something was wrong. His neck seemed stiff, kind of like how I imagine I look when I have a crick in my neck.
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
                src="{{ asset('/images/blog/blog-saying-goodbye-hero.jpg') }}"
                alt="Luka, a black and rust Doberman, rolling in the grass."
                class="w-full aspect-[8/3] object-cover rounded-md">

            <x-public-v2.image-registration
                text="Luka, Photo by Melanie O'Rorke"
                position="left" />

        </div>
        {{-- End Guide Hero Image --}}

        {{-- Guide Body --}}
        <div class="grid grid-cols-10 items-stretch gap-6">

            {{-- Main Guide Content --}}
            <article class="col-span-10 md:col-span-7">

                <p class="body text-sp-slate">
                    When my husband woke up, I told him something was wrong. He called Luka, but Luka didn’t run and jump on him as he normally would have. Lyle agreed something was not right. We called off work and we went to the vet. They did blood tests to check organ function. We did radiographs all down his spine and of course of his heart. He was showing no signs of neurological issues. It was determined that he had a pinched nerve, or impinged muscle in his neck. We were going to start conservatively to see if it would relax on its own. We left the vet with meds, a chiropractor referral, and hope that he will be better in a few days.
                </p>

                <p class="body text-sp-slate mt-4">
                    Once home, he was still very subdued. We talked to the kids about his medicine schedule since they would need to help with it while we were at work. He was sleeping peacefully in his crate when I headed to teach my Tricks class for the week. Once home, Luka had his first set of meds on board and was very subdued. I made a pallet on the floor and lay down to watch TV with him before my evening shift. During this time, he wet himself on the pallet, and I called the vet.
                </p>

                <p class="body text-sp-slate mt-4">
                    I mentioned that Luka was more subdued than I expected, and that voiding his bladder while lying down was completely new, and I was a bit worried. The doctor said maybe it was just too much, and to give him half the cocktail at bed time. I set up an exercise pen off the crate door and went to work. He was sleeping when I left. When I got home, he could barely walk. He wet himself again. After talking to a very knowledgeable dog friend, she recommended I don't give him the nighttime meds, and assess at what would be the halfway point to his next dose.
                </p>

                <p class="body text-sp-slate mt-4">
                    I don’t remember if this is when I first thought that he seemed “locked in.” He seemed like someone who is completely aware of what is happening, but unable to move. His eyes were alert, not even his ears flicked. I laid down with him in the ex-pen. Once he seemed to be sleeping well, I got in bed for around two hours. I don’t think I slept, but I felt my moving around was keeping Luka from the rest he needed.
                </p>

                <p class="body text-sp-slate mt-4">
                    At 2:00am Luka had not only wet himself, but had also had a bowel movement. He couldn’t even stand up. I carried him, all seventy one pounds of him, outside. At this point he didn’t even attempt to stand. His breathing was labored, but his capillary response was still good.
                </p>

                <p class="body text-sp-slate mt-4">
                    After having him outside for a while, I took him into the bathroom. I had cleaned up all the urine with towels and wet rags, but the bowel movement was not as easy to clean this way. He needed at least a rear end bath. Anyone who has ever met Luka knows he was incredibly hydrophobic. Baths were also something he did because I tried to make them easy, but he would high step heavy dew. I honestly thought that putting him in the bath tub would make something happen. Nothing did. He continued to lie there while I cleaned him up. Once done, I wrapped him in a dry towel and carried him back to the ex-pen. His breathing was more labored. I propped him up on throw pillows, anything I could find to elevate his chest and neck, and when his breathing seemed to return to normal, I fell asleep with him.
                </p>

                <p class="body text-sp-slate mt-4">
                    At 5:00am I was awake again. He had wet himself once again. I cleaned him up and just sat with him. He still seemed locked in. His eyes were alert, he was with me, his body just didn’t seem to be. At 6:00am I started getting ready for work. Once I was dressed I decided to take him outside to see if the nice weather would do anything to help bring him around. Surely the meds were wearing off by now? Right?
                </p>

                <p class="body text-sp-slate mt-4">
                    I carried him outside and laid him in the grass. He was so still, his breathing ragged and heavy. I begged him to just hold on. Hold on while the meds finished wearing off, then he’d feel better. I went to check his capillary response. His gums were blue. I checked his heart beat. There was nothing. I screamed for Lyle and began CPR and rescue breathing. Lyle was waking the kids up, we didn’t want him to pass and them not be able to say goodbye.
                </p>

                <p class="body text-sp-slate mt-4">
                    Then he took a breath. I had gotten him back! We all jumped in the car and headed to the vet.
                </p>

                <p class="body text-sp-slate mt-4">
                    His breathing was still ragged, but he was breathing. I kept begging him to hold on until we could get to the vet eighteen and a half miles away.
                </p>

                <p class="body text-sp-slate mt-4">
                    He stopped breathing again. Again I performed rescue breaths and he returned. I don’t know how many times we did this, I just know that it wasn’t enough. I was completely out of breath and bawling, screaming for him to stay with me. Lyle was driving in the front seat, I think he was crying and screaming too. Krissy in the front passenger seat, and Stetson in the back with Luka and I. All of us—screaming for him to stay.
                </p>

                <p class="body text-sp-slate mt-4">
                    I can’t tell you where we were, just somewhere on Highway 88, between Inola and Claremore. I can’t tell you what time it was. Our vet opens at 7:30am, and we got there right around that time.
                </p>

                <p class="body text-sp-slate mt-4">
                    The staff at our vet clinic was amazing. The veterinarian who had worked with us the day before was just walking in as I got out of the car. What a horrible way to start her day. She was so kind and compassionate. They sent techs out to help us get him inside.
                </p>

                <p class="body text-sp-slate mt-4">
                    After explaining everything that had happened through the night, they think that he had a blood clot, and passed due to a pulmonary embolism. He was four and a half years old. I’ve never had that kind of bond with a dog before. My heart literally hurt, my ribs too. Turns out that when I put him in the bathtub, I bruised, or possibly cracked the ribs on my left side.
                </p>

                <p class="body text-sp-slate mt-4">
                    For days I cried myself to sleep. I cried just sitting around. I cried watching TV. I felt I would never run out of tears. My dog family and close friends and family really rallied around our family. We received condolences, cards and gifts, and snacks and food. I realized how large my very scared and reactive dog had made my life.
                </p>

                <p class="body text-sp-slate mt-4">
                    I really didn’t realize that 90% (or more if you ask my husband) of my life revolved around Luka and all we did together. From tricks training, to NASDA, to learning all I could about reactivity and fearful behavior, Luka introduced me to so many new things. Along the way we met so many great people. People that I am glad to have in my life, and consider my found family. As an introvert I’ve never had a large circle, now I have a much larger circle than I ever realized.
                </p>

                <p class="body text-sp-slate mt-4">
                    I will continue my journey to being a dog trainer. I will always have a soft spot for big dogs that are fearful and reactive. I do want to help reactive dogs in the future. I will continue to learn, and grow. That will be Luka’s legacy. He unlocked a passion in me. It would be wrong of me to let him down.
                </p>

                {{-- Tags --}}

                        <div class="col-span-12 md:col-span-8 mt-10">

                            <x-public-v2.learn-tags
                                :tags="[
                    'NASDA',
                    'Reactive dogs',
                    'Trick Dog',
                    'Private Training',
                    'First Trials',
                    'Resource Roundup',
                ]" />

                        </div>

                  
                {{-- End Tags --}}


            </article>

            

            {{-- Supporting Figures --}}
            <aside class="col-span-10 self-start md:col-span-3">

                <figure>

                    <img
                        src="{{ asset('/images/blog/blog-saying-goodbye-01.jpg') }}"
                        alt="Luka in June 2025, less than a month before I would lose him."
                        class="block w-full rounded-md">

                    <figcaption class="text-sx text-sp-slate mt-3">
                        Luka in June 2025, less than a month before I would lose him.
                    </figcaption>

                </figure>

                <figure class="mt-10">

                    <img
                        src="{{ asset('/images/blog/blog-saying-goodbye-02.jpg') }}"
                        alt="Luka competed for the last time in June of 2025. He completed his Urban Locating, and Lost Item level one titles."
                        class="block w-full rounded-md">

                    <figcaption class="text-sx text-sp-slate mt-3">
                        Luka competed for the last time in June of 2025. He completed his Urban Locating, and Lost Item level one titles.
                    </figcaption>

                </figure>

                <figure class="mt-10">

                    <img
                        src="{{ asset('/images/blog/blog-saying-goodbye-03.jpg') }}"
                        alt="Luka in June 2025, less than a month before I would lose him."
                        class="block w-full rounded-md">

                    <figcaption class="text-sx text-sp-slate mt-3">
                        Luka in June 2025, less than a month before I would lose him.
                    </figcaption>

                </figure>


            </aside>

        </div>
        {{-- End Article Body --}}



    </div>


</section>
{{-- End Article Content --}}


@endsection