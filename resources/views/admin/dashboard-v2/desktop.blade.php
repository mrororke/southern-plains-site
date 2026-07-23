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


    <x-admin.sidebar.sidebar :navigation="$navigation" />

    <div class="col-span-11 grid grid-rows-[auto_1fr] h-full">

        <x-admin.top-nav />

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