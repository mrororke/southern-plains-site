        <!-- Slide Down Menu -->

        <nav
            x-show="menuOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="-translate-y-full"
            x-transition:enter-end="translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="translate-y-0"
            x-transition:leave-end="-translate-y-full"
            class="absolute top-0 left-0 w-full bg-sp-warmIvory z-40 pt-20 shadow-md">
            <div class="px-6 py-4">
                <!-- TODO: This should be global search; When you search, it shouldn't disappear. It should remain there. -->
                <input
                    type="text"
                    name="globalSearch"
                    value=""
                    placeholder="Search anything..."
                    class="block border border-sp-charcoal rounded-md focus:border-sp-charcoal placeholder:italic placeholder:text-md placeholder:text-sp-charcoal w-full bg-transparent">
            </div>

            <a href="#"
                class="block px-6 py-4 text-sp-charcoal border-b border-sp-warmStone">
                Dashboard
            </a>

            <a href="#"
                class="block px-6 py-4 text-sp-charcoal border-b border-sp-warmStone">
                Behavior Library
            </a>
            <a href="#"
                class="block px-6 py-4 text-sp-charcoal border-b border-sp-warmStone">
                Resource Library
            </a>
            <a href="{{ route('profile.edit') }}"
                class="block px-6 py-4 text-sp-charcoal border-b border-sp-warmStone">
                Profile
            </a>

            <x-admin.mobile.nav-link
                :href="route('admin.dashboard')"
                :active="request()->routeIs('admin.dashboard')">
                Sample Link
            </x-admin.mobile.nav-link>

        </nav>