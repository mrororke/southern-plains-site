<div class="hidden md:block md:flex items-center space-x-4">
    
    {{-- Home Link: Uses 'welcome' or 'home' route --}}
    @php $isHome = request()->routeIs('home') || request()->routeIs('home'); @endphp
    <a href="{{ route('home') }}" 
       class="px-3 py-2 text-sm font-medium uppercase hover:text-club hover:underline {{ $isHome ? 'text-green-700 border-b-3 border-green-700' : 'text-black' }}">
        Home
    </a>

    {{-- About Link: Uses 'about' route --}}
    @php $isAbout = request()->routeIs('about'); @endphp
    <a href="{{ route('about') }}" 
       class="px-3 py-2 text-sm font-medium uppercase hover:text-club hover:underline {{ $isAbout ? 'text-green-700 border-b-3 border-green-700' : 'text-black' }}">
        About
    </a>
    
    {{-- Blog Link: Uses 'blog.index' route --}}
    @php $isBlog = request()->routeIs('blog.index') || request()->routeIs('blog.*'); @endphp
    <a href="{{ route('blog.index') }}" 
       class="px-3 py-2 text-sm font-medium uppercase hover:text-club hover:underline {{ $isBlog ? 'text-green-700 border-b-3 border-green-700' : 'text-black' }}">
        Blog
    </a>

    {{-- Training/Services Link: Uses 'services' route --}}
    @php $isTraining = request()->routeIs('services'); @endphp
    <a href="{{ route('services') }}" 
       class="px-3 py-2 text-sm font-medium uppercase hover:text-club hover:underline {{ $isTraining ? 'text-green-700 border-b-3 border-green-700' : 'text-black' }}">
        Training
    </a>

    {{-- League Link: Uses 'league' route --}}
    @php $isLeague = request()->routeIs('league'); @endphp
    <a href="{{ route('league') }}" 
       class="px-3 py-2 text-sm font-medium uppercase hover:text-club hover:underline {{ $isLeague ? 'text-green-700 border-b-3 border-green-700' : 'text-black' }}">
        League
    </a>

    {{-- Events Link: Uses 'events' route --}}
    @php $isEvents = request()->routeIs('events'); @endphp
    <a href="{{ route('events') }}" 
       class="px-3 py-2 text-sm font-medium uppercase hover:text-club hover:underline {{ $isEvents ? 'text-green-700 border-b-3 border-green-700' : 'text-black' }}">
        Events
    </a>

    {{-- Contact Button: Uses 'contact' route --}}
    @php $isContact = request()->routeIs('contact'); @endphp
    <a href="{{ route('contact') }}" aria-current="page">
        <x-primary-button class="ms-4 {{ $isContact ? 'bg-green-700 hover:bg-green-800' : '' }}">
            {{ __('Contact Us') }}
        </x-primary-button>
    </a>
</div>