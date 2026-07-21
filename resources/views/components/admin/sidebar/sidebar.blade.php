<aside
    @mouseenter="sidebarOpen = true"
    @mouseleave="sidebarOpen = false"
    class="flex flex-col bg-sp-deepGranite text-sp-softWhite">
        
        <a href="{{ route('admin.dashboard') }}"
            class="group flex pt-4 justify-center">
            <x-icons.admin-logo class="transition-colors group-hover:text-sp-controlledLime" />
        </a>

        <x-admin.sidebar.dock-link
            route="admin.dashboard-v2"
            activeRoute="admin.dashboard-v2"
            icon="dashboard" />

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

    <x-admin.sidebar.nav-link
    route="admin.dashboard-v2"
    active-route="admin.dashboard-v2"
    icon="dashboard"
    label="Dashboard" />

</div>