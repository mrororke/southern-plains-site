<aside
    @mouseenter="sidebarOpen = true"
    @mouseleave="sidebarOpen = false"
    class="flex flex-col bg-sp-deepGranite text-sp-softWhite">
        
    <a href="{{ route('admin.dashboard') }}"
            class="group flex pt-4 justify-center">
            <x-icons.admin-logo class="transition-colors group-hover:text-sp-controlledLime" />
        </a>

        <!-- TODO Create 'dock-item' component to keep things clean. -->
         <a href="{{ route('admin.dashboard') }}"
            class="group flex justify-center pt-12">

    <x-icons.dashboard
        @class([
            'transition-colors',
            'text-sp-controlledLime'=> request()->routeIs('admin.dashboard-v2'),
            'text-sp-softWhite group-hover:text-sp-controlledLime' => !request()->routeIs('admin.dashboard-v2'),
        ]) />

</a>
    </aside>

<!-- EXPANDED SIDEBAR -->
<div
    x-cloak
    @mouseenter="sidebarOpen = true"
    @mouseleave="sidebarOpen = false"
    :class="sidebarOpen 
    ? 'translate-x-0 opacity-100' 
    : '-translate-x-full opacity-0'"
    class="absolute top-0 left-0 h-screen w-64 bg-sp-deepGranite text-sp-softWhite z-50 transform transition-all duration-300 ease-out opacity-0">

    <a href="{{ route('admin.dashboard') }}"
        class="group flex pt-4 justify-center">
        <x-icons.admin-logo class="transition-colors duration-300 group-hover:text-sp-controlledLime" />
    </a>

    <a href="{{ route('admin.dashboard') }}"
        class="group flex items-center gap-4 pt-12 px-6">

        <x-icons.dashboard
            @class([
                'transition-colors',
                'text-sp-controlledLime' => request()->routeIs('admin.dashboard-v2'),
                'text-sp-softWhite group-hover:text-sp-controlledLime' => !request()->routeIs('admin.dashboard-v2'),
            ]) />

        <span
            x-show="sidebarOpen"
            x-transition.delay.150ms
            @class([
            'uppercase text-xs tracking-wide whitespace-nowrap transition-colors',
            'text-sp-controlledLime' => request()->routeIs('admin.dashboard-v2'),
            'text-sp-softWhite group-hover:text-sp-controlledLime' => !request()->routeIs('admin.dashboard-v2'),
        ])>
            Dashboard
        </span>

    </a>

</div>