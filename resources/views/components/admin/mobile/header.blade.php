<header class="flex items-center justify-between bg-sp-charcoal px-4 py-3 relative z-50">

            <!-- Logo -->
            <a href="{{ route('admin.dashboard') }}"
                class="group">

                <x-icons.admin-logo
                    class="h-8 w-auto text-sp-warmIvory transition-colors group-hover:text-sp-prairieGreen" />

            </a>


            <!-- Hamburger / Close Button -->
            <button
                type="button"
                @click="menuOpen = !menuOpen"
                class="text-sp-warmIvory transition-colors hover:text-sp-prairieGreen">

                <svg
                    x-show="!menuOpen"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    class="h-7 w-7">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />

                </svg>


                <svg
                    x-show="menuOpen"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    class="h-7 w-7 text-sp-softWhite">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18 18 6M6 6l12 12" />

                </svg>

            </button>

        </header>


        