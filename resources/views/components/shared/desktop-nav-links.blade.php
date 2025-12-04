<div class="hidden md:block md:flex items-center space-x-4">

    {{-- Home Link: Uses 'welcome' or 'home' route --}}
    @php $isHome = request()->routeIs('welcome') || request()->routeIs('home'); @endphp
    <a href="{{ route('welcome') }}"
        class="px-3 py-2 text-sm font-medium uppercase hover:text-club 
       {{-- 💡 APPLY CUSTOM ACTIVE CLASSES --}}
       {{ $isHome ? 'text-club-active border-b-3 border-club-active' : 'text-black' }}">
        Home
    </a>

    {{-- About Link: Uses 'about' route --}}
    @php $isAbout = request()->routeIs('about'); @endphp
    <a href="{{ route('about') }}"
        class="px-3 py-2 text-sm font-medium uppercase hover:text-club 
       {{-- 💡 APPLY CUSTOM ACTIVE CLASSES --}}
       {{ $isAbout ? 'text-club-active border-b-3 border-club-active' : 'text-black' }}">
        About
    </a>

    {{-- Blog Link: Uses 'blog.index' route --}}
    @php $isBlog = request()->routeIs('blog.index') || request()->routeIs('blog.*'); @endphp
    <a href="{{ route('blog.index') }}"
        class="px-3 py-2 text-sm font-medium uppercase hover:text-club 
       {{-- 💡 APPLY CUSTOM ACTIVE CLASSES --}}
       {{ $isBlog ? 'text-club-active border-b-3 border-club-active' : 'text-black' }}">
        Blog
    </a>

    {{-- Training/Services Link: Uses 'services' route --}}
    @php $isTraining = request()->routeIs('training.index'); @endphp

    <a href="{{ route('training.index') }}"
        class="px-3 py-2 text-sm font-medium uppercase hover:text-club 
       {{-- 💡 APPLY CUSTOM ACTIVE CLASSES --}}
       {{ $isTraining ? 'text-club-active border-b-3 border-club-active' : 'text-black' }}">
        Training
    </a>
    </a>

    {{-- League Link: Uses 'league' route --}}
    @php $isLeague = request()->routeIs('league.index'); @endphp
    <a href="{{ route('league.index') }}"
        class="px-3 py-2 text-sm font-medium uppercase hover:text-club 
       {{-- 💡 APPLY CUSTOM ACTIVE CLASSES --}}
       {{ $isLeague ? 'text-club-active border-b-3 border-club-active' : 'text-black' }}">
        League
    </a>

    {{-- Events Link: Uses 'events' route --}}
    @php $isEvents = request()->routeIs('events.index'); @endphp
    <a href="{{ route('events.index') }}"
        class="px-3 py-2 text-sm font-medium uppercase hover:text-club 
       {{-- 💡 APPLY CUSTOM ACTIVE CLASSES --}}
       {{ $isEvents ? 'text-club-active border-b-3 border-club-active' : 'text-black' }}">
        Events
    </a>

    {{-- Contact Button: Uses 'contact' route --}}
    @php $isContact = request()->routeIs('contact'); @endphp
    <a href="{{ route('contact.create') }}" aria-current="page">
        <x-primary-button class="ms-4 
            {{-- 💡 APPLY CUSTOM ACTIVE BACKGROUND FOR BUTTON --}}
            {{ $isContact ? 'bg-club-active hover:bg-club-dark' : '' }}">
            {{ __('Contact Us') }}
        </x-primary-button>
    </a>
</div>