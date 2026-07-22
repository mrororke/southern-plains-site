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


    <body 
    x-data="{ sidebarOpen: false }"
    class="bg-sp-softWhite font-sans antialiased grid grid-cols-12 h-screen">

    @php
    dd($navigation)
    @endphp

    <x-admin.sidebar.sidebar :navigation="$navigation" />

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

        <main class="p-4">
            {{ Breadcrumbs::render() }}
            <div class="py-4">
                <img src="{{ asset('images/headers/dashboard.png') }}" alt="Dashboard Header" class="rounded-md">
            </div>

            <div
                x-data="{ tab: 'all' }"
                class="border-2 border-sp-alloyGray text-sp-deepGranite rounded-md my-4">

                <!-- Card Header / Tabs -->
                <div class="border-b border-sp-alloyGray">
                    <nav class="flex gap-6 px-6">

                        <button
                            @click="tab = 'all'"
                            :class="tab === 'all' 
                    ? 'border-b-2 border-sp-controlledLime text-sp-deepGranite uppercase text-xs tracking-wide' 
                    : 'text-sp-deepGranite uppercase text-xs tracking-wide'"
                            class="py-4">
                            All (Count)
                        </button>

                        <button
                            @click="tab = 'trickEvals'"
                            :class="tab === 'trickEvals' 
                    ? 'border-b-2 border-sp-controlledLime text-sp-deepGranite uppercase text-xs tracking-wide' 
                    : 'text-sp-deepGranite uppercase text-xs tracking-wide'"
                            class="py-4">
                            Trick Evaluations
                        </button>

                        <button
                            @click="tab = 'contactMessages'"
                            :class="tab === 'contactMessages' 
                    ? 'border-b-2 border-sp-controlledLime text-sp-deepGranite uppercase text-xs tracking-wide' 
                    : 'text-sp-deepGranite uppercase text-xs tracking-wide'"
                            class="py-4">
                            Contact Messages
                        </button>
                        <button
                            @click="tab = 'formSubmissions'"
                            :class="tab === 'formSubmissions' 
                    ? 'border-b-2 border-sp-controlledLime text-sp-deepGranite uppercase text-xs tracking-wide' 
                    : 'text-sp-deepGranite uppercase text-xs tracking-wide'"
                            class="py-4">
                            Form Submissions
                        </button>
                        <button
                            @click="tab = 'onlineEvaluations'"
                            :class="tab === 'onlineEvaluations' 
                    ? 'border-b-2 border-sp-controlledLime text-sp-deepGranite uppercase text-xs tracking-wide' 
                    : 'text-sp-deepGranite uppercase text-xs tracking-wide'"
                            class="py-4">
                            Online Evaluations
                        </button>
                        <button
                            @click="tab = 'resourceRequests'"
                            :class="tab === 'resourceRequests' 
                    ? 'border-b-2 border-sp-controlledLime text-sp-deepGranite uppercase text-xs tracking-wide' 
                    : 'text-sp-deepGranite uppercase text-xs tracking-wide'"
                            class="py-4">
                            Resource Requests
                        </button>
                        <button
                            @click="tab = 'trackingSport'"
                            :class="tab === 'trackingSport' 
                    ? 'border-b-2 border-sp-controlledLime text-sp-deepGranite uppercase text-xs tracking-wide' 
                    : 'text-sp-deepGranite uppercase text-xs tracking-wide'"
                            class="py-4">
                            Tracking Sport Feedback
                        </button>

                    </nav>
                </div>


                <!-- Card Content -->
                <div class="p-6">

                    <div x-show="tab === 'all'">
                        All content
                    </div>

                    <div x-show="tab === 'trickEvals'">
                        Trick Evaluations
                    </div>

                    <div x-show="tab === 'contactMessages'">
                        Contact Messages
                    </div>

                    <div x-show="tab === 'formSubmissions'">
                        Form Submissions
                    </div>
                    <div x-show="tab === 'onlineEvaluations'">
                        Online Evaluations
                    </div>
                    <div x-show="tab === 'resourceRquests'">
                        Resource Requests
                    </div>
                    <div x-show="tab === 'trackingSport'">
                        Tracking Sport Feedback
                    </div>
                </div>

            </div>
        </main>

    </div>

</body>