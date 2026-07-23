<nav class="bg-sp-alloyGray grid grid-cols-12 items-center">
            <div class="col-span-10 pr-8 p-4">
                <!-- TODO: This should be global search; When you search, it shouldn't disappear. It should remain there. -->
                <input
                    type="text"
                    name="globalSearch"
                    value=""
                    placeholder="Search anything..."
                    class="mt-1 block border border-sp-deepGranite rounded-md bg-transparent focus:border-sp-deepGranite placeholder:italic placeholder:text-md placeholder:text-sp-deepGranite w-full ">
            </div>
            <div class="col-span-2 flex justify-end pr-4">
                <div
                    x-data="{ open: false }"
                    class="relative">

                    <button
                        @click="open = !open"
                        @click.outside="open = false"
                        class="flex items-center gap-2 text-sp-darkGranite">

                        <span>{{ Auth::user()->name }}</span>

                        <svg class="w-4 h-4 transition-transform"
                            :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down-icon lucide-chevron-down">
                            <path d="m6 9 6 6 6-6" />
                        </svg>

                    </button>

                    <div
                        x-show="open"
                        x-transition
                        class="absolute right-0 mt-3 w-56 rounded-md bg-sp-alloyGray border border-b">

                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-3 hover:bg-gray-100">
                            Profile
                        </a>

                        <button
                            class="block w-full text-left px-4 py-3 hover:bg-gray-100">
                            Settings
                        </button>

                        <hr>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button
                                class="block w-full text-left px-4 py-3 hover:bg-gray-100">
                                Log Out
                            </button>

                        </form>

                    </div>

                </div>
            </div>
        </nav>