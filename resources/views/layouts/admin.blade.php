<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - @yield('title', 'Your App Name')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen">
        
        <aside class="w-64 bg-gray-800 text-white flex flex-col">
            <div class="p-4 text-2xl font-bold border-b border-gray-700">
                Admin Panel
            </div>
            
            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">
                    Dashboard
                </a>
                
                <a href="{{ route('admin.posts.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 @if(request()->routeIs('admin.posts.*')) bg-gray-700 @endif">
                    Post Management
                </a>
                
                {{-- Add more links here later (e.g., Categories, Tags, Users) --}}

            </nav>

            <div class="p-4 border-t border-gray-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left py-2 px-4 text-sm rounded transition duration-200 hover:bg-red-700 bg-red-600">
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