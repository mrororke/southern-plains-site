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

                <details class="group" style="margin-top: 0 !important;">
                    <summary class="block cursor-pointer hover:bg-gray-500">
                        <div class="flex middle-align justify-left items-center transition duration-200 uppercase text-sm hover:bg-gray-700 p-4" style="padding: 10px 0 10px 10px;  border-bottom:1px solid #ffffff;">
                            <div>
                                <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.80859 4.34766L8.75 7.4375C8.99609 7.84766 8.85938 8.36719 8.44922 8.64062C8.3125 8.72266 8.14844 8.75 8.01172 8.75C7.71094 8.75 7.41016 8.61328 7.24609 8.33984L6.48047 7.08203V13.125C6.48047 13.6172 6.01562 14 5.57812 14C5.11328 14 4.73047 13.6172 4.73047 13.125V9.1875H4.29297V13.125C4.29297 13.6172 3.80078 14 3.36328 14C2.89844 14 2.51562 13.6172 2.51562 13.125L2.54297 7.08203L1.75 8.33984C1.47656 8.75 0.957031 8.88672 0.546875 8.64062C0.136719 8.36719 0 7.82031 0.246094 7.41016L2.1875 4.34766C2.51562 3.82812 3.0625 3.5 3.66406 3.5H5.33203C5.93359 3.5 6.48047 3.82812 6.80859 4.34766ZM4.48438 2.625C3.77344 2.625 3.17188 2.05078 3.17188 1.3125C3.17188 0.601562 3.77344 0 4.51172 0C5.22266 0 5.76953 0.601562 5.76953 1.3125C5.76953 2.05078 5.19531 2.625 4.48438 2.625ZM13.2344 2.625C12.5234 2.625 11.9219 2.05078 11.9219 1.3125C11.9219 0.601562 12.4688 0 13.2344 0C13.9727 0 14.5469 0.601562 14.5469 1.3125C14.5469 2.05078 13.9453 2.625 13.2344 2.625ZM17.5 7.41016C17.7461 7.82031 17.6094 8.36719 17.1992 8.64062C17.0625 8.72266 16.8984 8.75 16.7617 8.75C16.4609 8.75 16.1602 8.61328 15.9688 8.33984L15.0664 6.91797L16.2695 10.5H15.2031V13.125C15.2031 13.6172 14.7656 14 14.3281 14C13.8633 14 13.4805 13.6172 13.4805 13.125V10.5H13.043V13.125C13.043 13.6172 12.5781 14 12.1406 14C11.6758 14 11.293 13.6172 11.293 13.125V10.5H10.1719L11.375 6.91797L10.5 8.33984C10.2266 8.75 9.70703 8.88672 9.29688 8.64062C8.88672 8.36719 8.75 7.84766 8.99609 7.4375L10.6914 4.75781C11.1562 3.96484 12.0039 3.5 12.9062 3.5H13.5898C14.4922 3.5 15.3398 3.96484 15.8047 4.75781L17.5 7.41016Z" fill="white" />
                                </svg>

                            </div>
                            <div class="col-span-3">
                                <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4  @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">
                                    People
                                </a>
                            </div>
                        </div>
                    </summary>

                    <ul class="py-4">
                        <li>
                            <a href="#" class="block py-2 text-white hover:text-primary text-sm uppercase" style="border-bottom: 1px solid #ffffff; padding: 10px 0 20px 50px;">
                                Clients
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