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
                <div class="flex middle-align justify-left items-center transition duration-200 uppercase text-sm hover:bg-gray-700 p-4" style="padding: 10px 0 10px 10px; border-top: 1px solid #ffffff; border-bottom:1px solid #ffffff; margin-bottom: 0 !important;">


                    <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4  @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">
                        Dashboard
                    </a>
                </div>

                <details class="group" style="margin-top: 0 !important;">
                    <summary class="block cursor-pointer hover:bg-gray-500">
                        <div class="flex middle-align justify-left items-center transition duration-200 uppercase text-sm hover:bg-gray-700 p-4" style="padding: 10px 0 10px 10px;  border-bottom:1px solid #ffffff;">

                            <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4  @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">
                                Content
                            </a>
                        </div>
                    </summary>

                    <ul>
                        <li>
                            <a href="{{ route('admin.posts.index') }}"  class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase" style="border-bottom: 1px solid #ffffff; padding: 10px 0 10px 50px; @if(request()->routeIs('admin.posts.*')) bg-gray-700 @endif">
                                Posts
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase" style="border-bottom: 1px solid #ffffff; padding: 10px 0 10px 50px;">
                                Categories
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase" style="border-bottom: 1px solid #ffffff; padding: 10px 0 10px 50px;">
                                Tags
                            </a>
                        </li>
                    </ul>
                </details>

                <details class="group" style="margin-top: 0 !important;">
                    <summary class="block cursor-pointer hover:bg-gray-500">
                        <div class="flex middle-align justify-left items-center transition duration-200 uppercase text-sm hover:bg-gray-700 p-4" style="padding: 10px 0 10px 10px;  border-bottom:1px solid #ffffff;">

                            <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4  @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">
                                Training
                            </a>
                        </div>
                    </summary>

                    <ul>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase" style="border-bottom: 1px solid #ffffff; padding: 10px 0 10px 50px;">
                                Programs
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase" style="border-bottom: 1px solid #ffffff; padding: 10px 0 10px 50px;">
                                Classes
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase" style="border-bottom: 1px solid #ffffff; padding: 10px 0 10px 50px;">
                                Workshops
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase" style="border-bottom: 1px solid #ffffff; padding: 10px 0 10px 50px;">
                                Private Training
                            </a>
                        </li>

                    </ul>
                </details>




                <a href="{{ route('admin.posts.index') }}" class="block py-2.5 px-4  transition duration-200 hover:bg-gray-500 @if(request()->routeIs('admin.posts.*')) bg-gray-700 @endif">
                    Post Management
                </a>
                <a href="{{ route('admin.rats.index') }}" class="block py-2.5 px-4  transition duration-200 hover:bg-gray-500 @if(request()->routeIs('admin.rats.*')) bg-gray-700 @endif">
                    Rat Management
                </a>

                {{-- Add more links here later (e.g., Categories, Tags, Users) --}}


            </nav>

            <div class="p-4 border-t border-gray-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left py-2 px-4 text-sm transition duration-200 hover:bg-red-700 bg-red-600">
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