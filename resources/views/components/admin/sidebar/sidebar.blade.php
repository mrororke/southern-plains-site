@props([
    'navigation',
])

<aside
    @mouseenter="sidebarOpen = true"
    @mouseleave="sidebarOpen = false"
    class="flex flex-col bg-sp-deepGranite text-sp-softWhite h-screen overflow-hidden">

    <!-- FIXED LOGO -->
    <a href="{{ route('admin.dashboard') }}"
        class="group flex pt-4 justify-center shrink-0">
        <x-icons.admin-logo class="transition-colors group-hover:text-sp-controlledLime" />
    </a>

    <!-- SCROLLING COLLAPSED NAV -->
    <div class="flex-1 overflow-y-auto overflow-x-hidden">
        @foreach($navigation as $item)
            @if(isset($item['route']))

                <x-admin.sidebar.dock-link
                    :route="$item['route']"
                    :activeRoute="$item['activeRoute']"
                    :icon="$item['icon']" />

            @endif
        @endforeach
    </div>

</aside>

<!-- EXPANDED SIDEBAR -->
<div
    x-cloak
    @mouseenter="sidebarOpen = true"
    @mouseleave="sidebarOpen = false"
    :class="sidebarOpen 
        ? 'translate-x-0 opacity-100' 
        : '-translate-x-full opacity-0'"
    class="absolute top-0 left-0 h-screen w-64 bg-sp-deepGranite text-sp-softWhite z-50 transform transition-all duration-300 ease-out opacity-0 overflow-hidden flex flex-col">

    <!-- FIXED LOGO -->
    <a href="{{ route('admin.dashboard') }}"
        class="group flex pt-4 justify-center shrink-0">
        <x-icons.admin-logo class="transition-colors duration-300 group-hover:text-sp-controlledLime" />
    </a>

    <!-- SCROLLING EXPANDED NAV -->
    <div class="flex-1 overflow-y-auto overflow-x-hidden">

        @foreach($navigation as $item)

            @if(isset($item['children']))

                <div class="flex items-center gap-4 px-6 pt-6 pb-2 text-xs uppercase tracking-wide text-sp-alloyGray">

                    <x-dynamic-component
                        :component="'icons.' . $item['icon']"
                        class="w-5 h-5 text-sp-softWhite" />

                    <span>
                        {{ $item['label'] }}
                    </span>

                </div>

                @foreach($item['children'] as $child)

                    <x-admin.sidebar.nav-link
                        :route="$child['route']"
                        :activeRoute="$child['activeRoute']"
                        :label="$child['label']"
                        :showIcon="false"
                        :child="true" />

                @endforeach

            @else

                <x-admin.sidebar.nav-link
                    :route="$item['route']"
                    :activeRoute="$item['activeRoute']"
                    :icon="$item['icon']"
                    :label="$item['label']" />

            @endif

        @endforeach

    </div>

</div>
