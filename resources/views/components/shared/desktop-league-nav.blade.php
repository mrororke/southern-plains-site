<div class="hidden md:block md:flex items-center space-x-4">

    {{-- Home Link: Uses 'welcome' or 'home' route --}}
    @php $isHome = request()->routeIs('welcome') || request()->routeIs('home'); @endphp
    <a href="{{ route('welcome') }}"
        class="px-3 py-2 text-sm font-medium uppercase hover:text-league 
       {{-- 💡 APPLY CUSTOM ACTIVE CLASSES --}}
       {{ $isHome ? 'text-league-active border-b-3 border-league-active' : 'text-black' }}">
        Home
    </a>

    {{-- About Link: Uses 'about' route --}}
    @php $isAbout = request()->routeIs('about'); @endphp
    <a href="{{ route('about') }}"
        class="px-3 py-2 text-sm font-medium uppercase hover:text-league 
       {{-- 💡 APPLY CUSTOM ACTIVE CLASSES --}}
       {{ $isAbout ? 'text-league-active border-b-3 border-league-active' : 'text-black' }}">
        About
    </a>

    {{-- Blog Link: Uses 'blog.index' route --}}
    @php $isBlog = request()->routeIs('blog.index') || request()->routeIs('blog.*'); @endphp
    <a href="{{ route('blog.index') }}"
        class="px-3 py-2 text-sm font-medium uppercase hover:text-league 
       {{-- 💡 APPLY CUSTOM ACTIVE CLASSES --}}
       {{ $isBlog ? 'text-league-active border-b-3 border-league-active' : 'text-black' }}">
        Blog
    </a>

    {{-- Training/Services Link: Uses 'services' route --}}
    @php $isTraining = request()->routeIs('training.index'); @endphp

    <a href="{{ route('training.index') }}"
        class="px-3 py-2 text-sm font-medium uppercase hover:league-club 
       {{-- 💡 APPLY CUSTOM ACTIVE CLASSES --}}
       {{ $isTraining ? 'text-league-active border-b-3 border-league-active' : 'text-black' }}">
        Training
    </a>
    </a>

    {{-- League Link: Uses 'league' route --}}
    @php $isLeague = request()->routeIs('league'); @endphp
    <a href="{{ route('league.index') }}"
        class="px-3 py-2 text-sm font-medium uppercase hover:text-league 
       {{-- 💡 APPLY CUSTOM ACTIVE CLASSES --}}
       {{ $isLeague ? 'text-league-active border-b-3 border-league-active' : 'text-black' }}">
        League
    </a>

    {{-- Events Link: Uses 'events' route --}}
    @php $isEvents = request()->routeIs('events'); @endphp
    <a href="{{ route('events') }}"
        class="px-3 py-2 text-sm font-medium uppercase hover:text-league 
       {{-- 💡 APPLY CUSTOM ACTIVE CLASSES --}}
       {{ $isEvents ? 'text-league-active border-b-3 border-league-active' : 'text-black' }}">
        Events
    </a>

    {{-- Contact Button: Uses 'contact' route --}}
    @php $isContact = request()->routeIs('contact'); @endphp
    <a href="{{ route('contact') }}" aria-current="page">
        <x-primary-button
            class="ms-4"
            color="league"
            {{-- Conditionally add the active background classes --}}
            activeClass="{{ $isContact ? 'bg-league-active hover:bg-league-dark' : '' }}">
            {{ __('Contact Us') }}
        </x-primary-button>
    </a>
</div>