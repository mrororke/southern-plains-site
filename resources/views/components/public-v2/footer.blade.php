<footer>

    <x-public-v2.newsletter />


    {{-- Main Footer Row --}}
    <div class="grid grid-cols-12 gap-y-8 px-8 py-8 footer-topo">

        {{-- Logo --}}
        <div class="col-span-12 md:col-span-1">

            <x-logo class="w-32 h-auto" />

        </div>


        {{-- Mission --}}
        <div class="col-span-12 md:col-span-2">

            <p class="text-sp-slate md:px-4">
                Building better dog and handler teams through positive training, dog sports, and community.
            </p>

        </div>


        {{-- Explore --}}
        <div class="col-span-6 md:col-span-2 md:col-start-6">

            <h4 class="footer">
                Explore
            </h4>

            <ul class="footer-nav">
                <li>
                    <a href="{{ route('public-v2.about') }}">About</a>
                </li>

                <li>
                    <a href="{{ route('public-v2.training') }}">Training</a>
                </li>

                <li>
                    <a href="{{ route('public-v2.dog-sports') }}">Dog Sports</a>
                </li>

                <li>
                    <a href="{{ route('public-v2.events.index') }}">Events</a>
                </li>

                <li>
                    <a href="{{ route('public-v2.contact') }}">Contact</a>
                </li>
            </ul>

        </div>


        {{-- Resources --}}
        <div class="col-span-6 md:col-span-2">

            <h4 class="footer">
                Resources
            </h4>

            <ul class="footer-nav">
                <li>
                    <a href="{{ route('public-v2.learn.index') }}">Getting Started</a>
                </li>

                <li>
                    <a href="{{ route('public-v2.learn.index') }}">Learn</a>
                </li>

                <li>
                    <a href="{{ route('public-v2.dog-sports') }}">NASDA</a>
                </li>

                <li>
                    <a href="{{ route('public-v2.dog-sports') }}">League Info</a>
                </li>

                <li>
                    <a href="{{ route('public-v2.learn.index') }}">Trick Dog</a>
                </li>
            </ul>
        </div>


        {{-- Contact --}}
        <div class="col-span-12 md:col-span-2">

            <h4 class="footer">
                Contact
            </h4>

            <ul class="footer-nav">

                <li>
                    <x-icons.map-pin />
                    Inola, Oklahoma
                </li>

                <li>
                    <x-icons.mail />

                    <a
                        href="mailto:southernplainssportdogclub@gmail.com"
                        class="break-all">
                        southernplainssportdogclub@gmail.com
                    </a>
                </li>

            </ul>

        </div>

    </div>


    {{-- Legal Row --}}
    <div class="grid grid-cols-12 gap-y-4 px-8 py-8 bg-sp-prairieGreen">

        <div class="col-span-12 md:col-span-8 text-sp-warmIvory text-sm">
            Copyright © 2025 - 2026 Southern Plains Sport Dog Club, LLC. All rights reserved.
        </div>

        <div class="col-span-12 md:col-span-4 text-sp-warmIvory text-sm md:text-right">
    <a href="{{ route('login') }}">Login</a>
    /
    <a href="{{ route('legal.privacy') }}">Privacy Policy</a>
    /
    <a href="{{ route('legal.tos') }}">Terms of Use</a>
</div>

    </div>

</footer>