@props([
    'navigation',
])

@php
    $user = auth()->user();

    $hasRole = fn ($role) =>
        $user &&
        method_exists($user, 'hasRole') &&
        $user->hasRole($role);

    $isAdmin =
        $hasRole('admin') ||
        data_get($user, 'role') === 'admin';

    $isInstructor =
        $hasRole('instructor') ||
        data_get($user, 'role') === 'instructor';

    $visibleNavigation = collect($navigation);

    if ($isAdmin) {
        $visibleNavigation = collect($navigation);
    } elseif ($isInstructor) {
        $visibleNavigation = collect($navigation)
            ->filter(function ($item) {
                return ($item['label'] ?? null) === 'Resources';
            })
            ->map(function ($item) {
                $item['children'] = collect($item['children'] ?? [])
                    ->filter(function ($child) {
                        return ($child['label'] ?? null) === 'Behavior Catalog';
                    })
                    ->values()
                    ->all();

                return $item;
            })
            ->filter(function ($item) {
                return ! empty($item['children']);
            })
            ->values();
    } else {
        $visibleNavigation = collect();
    }
@endphp


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
    <div class="flex-1 overflow-y-auto overflow-x-hidden flex flex-col pt-6 gap-4">
        @foreach($visibleNavigation as $item)

            <x-admin.sidebar.dock-link
                :route="$item['route'] ?? null"
                :activeRoute="$item['activeRoute'] ?? null"
                :icon="$item['icon']"
                :status="$item['status'] ?? 'active'" />

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

        @foreach($visibleNavigation as $item)

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
                        :route="$child['route'] ?? null"
                        :activeRoute="$child['activeRoute'] ?? null"
                        :label="$child['label']"
                        :showIcon="false"
                        :child="true"
                        :status="$child['status'] ?? $item['status'] ?? 'active'" />

                @endforeach

            @else

                <x-admin.sidebar.nav-link
                    :route="$item['route'] ?? null"
                    :activeRoute="$item['activeRoute'] ?? null"
                    :icon="$item['icon']"
                    :label="$item['label']"
                    :status="$item['status'] ?? 'active'" />

            @endif

        @endforeach

    </div>

</div>
