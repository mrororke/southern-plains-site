<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - @yield('title', 'Your App Name')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @googlefonts

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen">

        <aside class="w-64 bg-[#71717A] text-white flex flex-col" style="background-color: #71717A;">
            <div class="text-black lg:text-white mx-auto pt-4">
                <a href="/admin/dashboard">
                    <x-application-logo class="w-20 h-20 fill-current" />
                </a>

            </div>
            <div class="italic text-sm pt-4 mx-auto">
                {{ Auth::user()->name }}
            </div>



            <nav class="flex-1 pt-8 space-y-2">
                <div class="flex middle-align justify-left items-center transition duration-200 uppercase text-sm hover:bg-gray-700 p-4 border-t border-b border-white" style="padding: 10px 0 10px 10px; margin-bottom: 0 !important;">


                    <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4  @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">
                        Dashboard
                    </a>
                </div>

                <details class="group" style="margin-top: 0 !important;">
                    <summary class="block cursor-pointer hover:bg-gray-500">
                        <div class="flex middle-align justify-left items-center transition duration-200 uppercase text-sm hover:bg-gray-700 p-4 border-b border-white" style="padding: 10px 0 10px 10px;">

                            <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4  @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">
                                Content
                            </a>
                        </div>
                    </summary>

                    <ul>
                        <li>
                            <a href="{{ route('admin.posts.index') }}" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase" style="border-bottom: 1px solid #ffffff; padding: 10px 0 10px 50px; @if(request()->routeIs('admin.posts.*')) bg-gray-700 @endif">
                                Posts
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Categories
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Tags
                            </a>
                        </li>
                    </ul>
                </details>

                <details class="group" style="margin-top: 0 !important;">
                    <summary class="block cursor-pointer hover:bg-gray-500">
                        <div class="flex middle-align justify-left items-center transition duration-200 uppercase text-sm hover:bg-gray-700 p-4 border-b border-white" style="padding: 10px 0 10px 10px;">

                            <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4  @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">
                                Training
                            </a>
                        </div>
                    </summary>

                    <ul>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Programs
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Classes
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Workshops
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Private Training
                            </a>
                        </li>

                    </ul>
                </details>

                <details class="group" style="margin-top: 0 !important;">
                    <summary class="block cursor-pointer hover:bg-gray-500">
                        <div class="flex middle-align justify-left items-center transition duration-200 uppercase text-sm hover:bg-gray-700 p-4 border-b border-white" style="padding: 10px 0 10px 10px;">

                            <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4  @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">
                                League
                            </a>
                        </div>
                    </summary>

                    <ul>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Seasons
                            </a>
                        </li>

                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Competitors
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Scores
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Rankings
                            </a>
                        </li>

                    </ul>
                </details>

                <details class="group" style="margin-top: 0 !important;">
                    <summary class="block cursor-pointer hover:bg-gray-500">
                        <div class="flex middle-align justify-left items-center transition duration-200 uppercase text-sm hover:bg-gray-700 p-4 border-b border-white" style="padding: 10px 0 10px 10px;">

                            <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4  @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">
                                Events
                            </a>
                        </div>
                    </summary>

                    <ul>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Events
                            </a>
                        </li>

                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Calendar
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Registrations
                            </a>
                        </li>


                    </ul>
                </details>

                <details class="group" style="margin-top: 0 !important;">
                    <summary class="block cursor-pointer hover:bg-gray-500">
                        <div class="flex middle-align justify-left items-center transition duration-200 uppercase text-sm hover:bg-gray-700 p-4 border-b border-white" style="padding: 10px 0 10px 10px;">

                            <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4  @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">
                                CRM
                            </a>
                        </div>
                    </summary>

                    <ul>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Clients
                            </a>
                        </li>

                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Dogs
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                History Forms
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Evaluations
                            </a>
                        </li>

                    </ul>
                </details>

                <details class="group" style="margin-top: 0 !important;">
                    <summary class="block cursor-pointer hover:bg-gray-500">
                        <div class="flex middle-align justify-left items-center transition duration-200 uppercase text-sm hover:bg-gray-700 p-4 border-b border-white" style="padding: 10px 0 10px 10px;">

                            <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4  @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">
                                Learning
                            </a>
                        </div>
                    </summary>

                    <ul>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Courses
                            </a>
                        </li>

                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Lessons
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Resources
                            </a>
                        </li>
                    </ul>
                </details>

                <details class="group" style="margin-top: 0 !important;">
                    <summary class="block cursor-pointer hover:bg-gray-500">
                        <div class="flex middle-align justify-left items-center transition duration-200 uppercase text-sm hover:bg-gray-700 p-4 border-b border-white" style="padding: 10px 0 10px 10px;">

                            <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4  @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">
                                Rats
                            </a>
                        </div>
                    </summary>

                    <ul>
                        <li>
                            <a href="{{ route('admin.rats.index') }}" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white @if(request()->routeIs('admin.rats.*')) bg-gray-700 @endif" style="padding: 10px 0 10px 50px;">
                                Rats
                            </a>
                        </li>

                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Litters
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Pedigrees
                            </a>
                        </li>

                    </ul>
                </details>

                <details class="group" style="margin-top: 0 !important;">
                    <summary class="block cursor-pointer hover:bg-gray-500">
                        <div class="flex middle-align justify-left items-center transition duration-200 uppercase text-sm hover:bg-gray-700 p-4 border-b border-white" style="padding: 10px 0 10px 10px;">

                            <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4  @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">
                                Administration
                            </a>
                        </div>
                    </summary>

                    <ul>
                        <li>
                            <a href="{{ route('admin.rats.index') }}" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white @if(request()->routeIs('admin.rats.*')) bg-gray-700 @endif" style="padding: 10px 0 10px 50px;">
                                Users
                            </a>
                        </li>

                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Roles
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Permissions
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase border-b border-white" style="padding: 10px 0 10px 50px;">
                                Settings
                            </a>
                        </li>

                    </ul>
                </details>




            </nav>

            <div class="p-4 border-t border-white">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left py-2 px-4 text-sm uppercase transition duration-200 hover:bg-club-hover bg-club">
                        Log Out
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto">
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">@yield('page_title', 'Dashboard')</h2>
                <span class="text-gray-600">Welcome, {{ Auth::user()->name }}</span>
            </header>

            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>

</body>

</html>