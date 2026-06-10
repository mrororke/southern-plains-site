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
                            
                                <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4  @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">
                                    People
                                </a>
                        </div>
                    </summary>

                    <ul>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase" style="border-bottom: 1px solid #ffffff; padding: 10px 0 10px 50px;">
                                Clients
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase" style="border-bottom: 1px solid #ffffff; padding: 10px 0 10px 50px;">
                                Contacts
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase" style="border-bottom: 1px solid #ffffff; padding: 10px 0 10px 50px;">
                                Inquiries
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase" style="border-bottom: 1px solid #ffffff; padding: 10px 0 10px 50px;">
                                Members
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase" style="border-bottom: 1px solid #ffffff; padding: 10px 0 10px 50px;">
                                Volunteers
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase" style="border-bottom: 1px solid #ffffff; padding: 10px 0 10px 50px;">
                                Add a person
                            </a>
                        </li>
                    </ul>
                </details>

                <details class="group" style="margin-top: 0 !important;">
                    <summary class="block cursor-pointer hover:bg-gray-500">
                        <div class="flex middle-align justify-left items-center transition duration-200 uppercase text-sm hover:bg-gray-700 p-4" style="padding: 10px 0 10px 10px;  border-bottom:1px solid #ffffff;">
                            <div>
                                <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.1875 0.546875C9.24219 0.246094 9.51562 0 9.84375 0C10.0352 0 10.2266 0.109375 10.3633 0.273438L10.8281 0.875H12.25C12.5781 0.875 12.9336 1.03906 13.1797 1.28516L13.6719 1.75H15.2031C15.5586 1.75 15.8594 2.05078 15.8594 2.40625V3.0625C15.8594 4.29297 14.875 5.25 13.6719 5.25H11.7578L11.6211 6.09766L8.55859 4.34766L9.1875 0.546875ZM12.3594 1.75C12.1133 1.75 11.9219 1.96875 11.9219 2.1875C11.9219 2.43359 12.1133 2.625 12.3594 2.625C12.5781 2.625 12.7969 2.43359 12.7969 2.1875C12.7969 1.96875 12.5781 1.75 12.3594 1.75ZM11.4844 7.02734V13.125C11.4844 13.6172 11.0742 14 10.6094 14H9.73438C9.24219 14 8.85938 13.6172 8.85938 13.125V9.98047C8.17578 10.3359 7.4375 10.5 6.67188 10.5C5.87891 10.5 5.14062 10.3359 4.48438 9.98047V13.125C4.48438 13.6172 4.07422 14 3.60938 14H2.73438C2.24219 14 1.85938 13.6172 1.85938 13.125V6.83594C1.06641 6.53516 0.4375 5.87891 0.21875 5.03125L0.109375 4.59375C0 4.12891 0.300781 3.66406 0.765625 3.52734C1.23047 3.41797 1.69531 3.71875 1.83203 4.18359L1.91406 4.59375C2.02344 4.97656 2.37891 5.25 2.76172 5.25H8.39453L11.4844 7.02734Z" fill="white"/>
</svg>


                            </div>
                            <div class="col-span-3">
                                <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4  @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">
                                    Dogs
                                </a>
                            </div>
                        </div>
                    </summary>

                    <ul>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase" style="border-bottom: 1px solid #ffffff; padding: 10px 0 10px 50px;">
                                In Training
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase" style="border-bottom: 1px solid #ffffff; padding: 10px 0 10px 50px;">
                                League
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase" style="border-bottom: 1px solid #ffffff; padding: 10px 0 10px 50px;">
                                Evaluations
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase" style="border-bottom: 1px solid #ffffff; padding: 10px 0 10px 50px;">
                                Achievements
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 text-white  hover:bg-gray-700 text-sm uppercase" style="border-bottom: 1px solid #ffffff; padding: 10px 0 10px 50px;">
                                Add a New Dog
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