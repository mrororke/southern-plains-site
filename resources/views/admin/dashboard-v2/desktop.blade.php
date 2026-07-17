<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Southern Plains Sport Dog Club - @yield('title', 'Southern Plains Sport Dog Club')</title>

    @googlefonts

    @vite(['resources/css/dashboard-v2.css', 'resources/js/app.js'])

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js" defer></script>
</head>

<body class="bg-sp-softWhite font-sans antialiased grid grid-cols-12 h-screen">

    <aside class="flex flex-col bg-sp-deepGranite text-sp-softWhite">
        <a href="{{ route('admin.dashboard') }}"
            class="group flex pt-4 justify-center">
            <x-icons.admin-logo class="transition-colors group-hover:text-sp-controlledLime" />
        </a>

        <!-- TODO Create 'dock-item' component to keep things clean. -->
        <a href="{{ route('admin.dashboard') }}"
            class="group flex justify-center pt-12">

            <x-icons.dashboard
                @class([ 'transition-colors' , 'text-sp-controlledLime'=> request()->routeIs('admin.dashboard-v2'),
                'text-sp-softWhite group-hover:text-sp-controlledLime' => !request()->routeIs('admin.dashboard-v2'),
                ]) />

        </a>
    </aside>

    <div class="col-span-11 grid grid-rows-[auto_1fr] h-full">

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
                        class="absolute right-0 mt-3 w-56 rounded-md bg-sp-alloyGray">

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

        <main class="p-4">
            {{ Breadcrumbs::render() }}
            <div class="py-4">
                <img src="{{ asset('images/headers/dashboard.png') }}" alt="Dashboard Header" class="rounded-md">
            </div>
            Content area
        </main>

    </div>

</body>