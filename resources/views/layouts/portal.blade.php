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
                <div class="flex middle-align justify-left items-center transition duration-200 uppercase text-sm hover:bg-gray-700 p-4" style="padding: 10px 0 10px 10px; border-top: 1px solid #ffffff; border-bottom:1px solid #ffffff;">
                    <div>
                        <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.7227 7C15.7227 7.49219 15.3125 7.875 14.8477 7.875H13.9727L14 12.25C14 12.332 14 12.4141 14 12.4688V12.9062C14 13.5352 13.5078 14 12.9062 14H12.4688C12.4141 14 12.3867 14 12.3594 14C12.332 14 12.2773 14 12.25 14H10.7188C10.0898 14 9.625 13.5352 9.625 12.9062V10.5C9.625 10.0352 9.21484 9.625 8.75 9.625H7C6.50781 9.625 6.125 10.0352 6.125 10.5V12.9062C6.125 13.5352 5.63281 14 5.03125 14H3.5C3.44531 14 3.41797 14 3.36328 14C3.33594 14 3.30859 14 3.28125 14H2.84375C2.21484 14 1.75 13.5352 1.75 12.9062V9.84375C1.75 9.84375 1.75 9.81641 1.75 9.78906V7.875H0.875C0.382812 7.875 0 7.49219 0 7C0 6.75391 0.0820312 6.53516 0.273438 6.34375L7.27344 0.246094C7.46484 0.0546875 7.68359 0 7.875 0C8.06641 0 8.28516 0.0820312 8.44922 0.21875L15.4219 6.34375C15.6406 6.53516 15.75 6.75391 15.7227 7Z" fill="white" />
                        </svg>
                    </div>
                    <div class="col-span-3">
                        <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4  @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">
                            Dashboard
                        </a>
                    </div>
                </div>




                <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4 transition duration-200 hover:bg-gray-500 @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">
                    Dashboard
                </a>



                <a href="{{ route('admin.posts.index') }}" class="block py-2.5 px-4  transition duration-200 hover:bg-gray-500 @if(request()->routeIs('admin.posts.*')) bg-gray-700 @endif">
                    Post Management
                </a>
                <a href="{{ route('admin.rats.index') }}" class="block py-2.5 px-4  transition duration-200 hover:bg-gray-500 @if(request()->routeIs('admin.rats.*')) bg-gray-700 @endif">
                    Rat Management
                </a>

                {{-- Add more links here later (e.g., Categories, Tags, Users) --}}
                <details class="group">
                    <summary class="block cursor-pointer hover:bg-gray-500">
                        <div class="flex middle-align justify-left items-center transition duration-200 uppercase text-sm hover:bg-gray-700 p-4" style="padding: 10px 0 10px 10px; border-top: 1px solid #ffffff; border-bottom:1px solid #ffffff;">
                    <div>
                        <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.7227 7C15.7227 7.49219 15.3125 7.875 14.8477 7.875H13.9727L14 12.25C14 12.332 14 12.4141 14 12.4688V12.9062C14 13.5352 13.5078 14 12.9062 14H12.4688C12.4141 14 12.3867 14 12.3594 14C12.332 14 12.2773 14 12.25 14H10.7188C10.0898 14 9.625 13.5352 9.625 12.9062V10.5C9.625 10.0352 9.21484 9.625 8.75 9.625H7C6.50781 9.625 6.125 10.0352 6.125 10.5V12.9062C6.125 13.5352 5.63281 14 5.03125 14H3.5C3.44531 14 3.41797 14 3.36328 14C3.33594 14 3.30859 14 3.28125 14H2.84375C2.21484 14 1.75 13.5352 1.75 12.9062V9.84375C1.75 9.84375 1.75 9.81641 1.75 9.78906V7.875H0.875C0.382812 7.875 0 7.49219 0 7C0 6.75391 0.0820312 6.53516 0.273438 6.34375L7.27344 0.246094C7.46484 0.0546875 7.68359 0 7.875 0C8.06641 0 8.28516 0.0820312 8.44922 0.21875L15.4219 6.34375C15.6406 6.53516 15.75 6.75391 15.7227 7Z" fill="white" />
                        </svg>
                    </div>
                    <div class="col-span-3">
                        <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4  @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">
                            Posts
                        </a>
                    </div>
                </div>
                    </summary>

                    <ul class="pl-6 py-2">
                        <li>
                            <a href="#" class="block py-2 text-white hover:text-primary">
                                All Posts
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 hover:text-primary">
                                Create Post
                            </a>
                        </li>
                    </ul>
                </details>

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