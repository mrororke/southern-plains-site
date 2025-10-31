<div class="hidden md:block md:flex items-center space-x-4">
    
    {{-- Home Link: Uses 'welcome' or 'home' route --}}
    @php $isHome = request()->routeIs('welcome') || request()->routeIs('home'); @endphp
    <a href="{{ route('welcome') }}" 
       class="px-3 py-2 text-sm font-medium uppercase hover:text-{{ $accentColor }} 
       {{-- 💡 APPLY CUSTOM ACTIVE CLASSES --}}
       {{ $isHome ? 'text-{{ $accentColor }}-active border-b-3 border-{{ $accentColor }}-active' : 'text-black' }}">
        Home
    </a>

    {{-- About Link: Uses 'about' route --}}
    @php $isAbout = request()->routeIs('about'); @endphp
    <a href="{{ route('about') }}" 
       class="px-3 py-2 text-sm font-medium uppercase hover:text-{{ $accentColor }} 
       {{-- 💡 APPLY CUSTOM ACTIVE CLASSES --}}
       {{ $isAbout ? 'text-club-active border-b-3 border-{{ $accentColor }}-active' : 'text-black' }}">
        About
    </a>
    
    {{-- Blog Link: Uses 'blog.index' route --}}
    @php $isBlog = request()->routeIs('blog.index') || request()->routeIs('blog.*'); @endphp
    <a href="{{ route('blog.index') }}" 
       class="px-3 py-2 text-sm font-medium uppercase hover:text-{{ $accentColor }} 
       {{-- 💡 APPLY CUSTOM ACTIVE CLASSES --}}
       {{ $isBlog ? 'text-{{ $accentColor }}-active border-b-3 border-{{ $accentColor }}-active' : 'text-black' }}">
        Blog
    </a>

    {{-- Training/Services Link: Uses 'services' route --}}
    @php $isTraining = request()->routeIs('services'); @endphp
    <a href="{{ route('services') }}" 
       class="px-3 py-2 text-sm font-medium uppercase hover:text-{{ $accentColor }}-hover 
       {{-- 💡 APPLY CUSTOM ACTIVE CLASSES --}}
       {{ $isTraining ? 'text-{{ $accentColor }}-active border-b-3 border-{{ $accentColor }}-active' : 'text-black' }}">
        Training
    </a>

    {{-- League Link: Uses 'league' route --}}
    @php $isLeague = request()->routeIs('league'); @endphp
    <a href="{{ route('league') }}" 
       class="px-3 py-2 text-sm font-medium uppercase hover:text-club 
       {{-- 💡 APPLY CUSTOM ACTIVE CLASSES --}}
       {{ $isLeague ? 'text-{{ $accentColor }}-active border-b-3 border-{{ $accentColor }}-active' : 'text-black' }}">
        League
    </a>

    {{-- Events Link: Uses 'events' route --}}
    @php $isEvents = request()->routeIs('events'); @endphp
    <a href="{{ route('events') }}" 
       class="px-3 py-2 text-sm font-medium uppercase hover:text-club 
       {{-- 💡 APPLY CUSTOM ACTIVE CLASSES --}}
       {{ $isEvents ? 'text-{{ $accentColor }}-active border-b-3 border-{{ $accentColor }}-active' : 'text-black' }}">
        Events
    </a>

    {{-- Contact Button: Uses 'contact' route --}}
    @php $isContact = request()->routeIs('contact'); @endphp
    <a href="{{ route('contact') }}" aria-current="page">
        <x-primary-button class="ms-4 
            {{-- 💡 APPLY CUSTOM ACTIVE BACKGROUND FOR BUTTON --}}
            {{ $isContact ? 'bg-{{ $accentColor }}-active hover:bg-{{ $accentColor }}-dark' : '' }}">
            {{ __('Contact Us') }}
        </x-primary-button>
    </a>
</div>