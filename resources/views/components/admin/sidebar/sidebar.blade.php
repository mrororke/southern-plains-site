@props([
    'navigation',
])

@php
    $user = auth()->user();

    /*
    |--------------------------------------------------------------------------
    | Role detection
    |--------------------------------------------------------------------------
    | This is intentionally defensive because different Laravel apps store roles
    | differently:
    |
    | - Spatie roles: $user->hasRole('admin')
    | - role column: $user->role
    | - roles relationship: $user->roles->pluck('name')
    | - boolean flags: $user->is_admin, $user->is_instructor
    */

    $userRoleValues = collect();

    if ($user) {
        $userRoleValues = $userRoleValues
            ->push(data_get($user, 'role'))
            ->push(data_get($user, 'role.name'))
            ->push(data_get($user, 'type'))
            ->push(data_get($user, 'user_type'));

        if (isset($user->roles)) {
            $roles = $user->roles;

            if ($roles instanceof \Illuminate\Support\Collection) {
                $userRoleValues = $userRoleValues->merge(
                    $roles->map(function ($role) {
                        return data_get($role, 'name') ?? data_get($role, 'slug') ?? $role;
                    })
                );
            }
        }
    }

    $normalizedRoles = $userRoleValues
        ->filter()
        ->map(function ($role) {
            return strtolower(trim((string) $role));
        })
        ->values();

    $hasRole = function ($role) use ($user, $normalizedRoles) {
        $role = strtolower(trim((string) $role));

        if (! $user) {
            return false;
        }

        if (method_exists($user, 'hasRole')) {
            try {
                if ($user->hasRole($role)) {
                    return true;
                }

                if ($user->hasRole(ucfirst($role))) {
                    return true;
                }
            } catch (\Throwable $e) {
                // Ignore and continue checking other role formats.
            }
        }

        return $normalizedRoles->contains($role);
    };

    $isAdmin =
    $hasRole('admin') ||
    data_get($user, 'is_admin') === true ||
    data_get($user, 'is_admin') === 1 ||
    ($user && method_exists($user, 'isAdmin') && $user->isAdmin());

$isInstructor =
    $hasRole('instructor') ||
    data_get($user, 'is_instructor') === true ||
    data_get($user, 'is_instructor') === 1 ||
    ($user && method_exists($user, 'isInstructor') && $user->isInstructor());


    /*
    |--------------------------------------------------------------------------
    | Navigation visibility
    |--------------------------------------------------------------------------
    |
    | Admin:
    | - sees everything
    |
    | Instructor:
    | - sees Dashboard
    | - sees Resources
    | - inside Resources, only sees Behavior Catalog
    |
    | Everyone else:
    | - sees nothing
    */

    $visibleNavigation = collect($navigation);

    if ($isAdmin) {
        $visibleNavigation = collect($navigation)->values();
    } elseif ($isInstructor) {
        $visibleNavigation = collect($navigation)
            ->map(function ($item) {
                $label = strtolower(trim((string) ($item['label'] ?? '')));

                if ($label === 'dashboard') {
                    return $item;
                }

                if ($label === 'resources') {
                    $item['children'] = collect($item['children'] ?? [])
                        ->filter(function ($child) {
                            $childLabel = strtolower(trim((string) ($child['label'] ?? '')));

                            return $childLabel === 'behavior catalog';
                        })
                        ->values()
                        ->all();

                    return ! empty($item['children']) ? $item : null;
                }

                return null;
            })
            ->filter()
            ->values();
    } else {
        $visibleNavigation = collect();
    }
@endphp

<aside
    @mouseenter="sidebarOpen = true"
    @mouseleave="sidebarOpen = false"
    class="flex flex-col bg-sp-charCoal text-sp-warmIvory h-full overflow-hidden">

    <!-- FIXED LOGO -->
    <a href="{{ route('admin.dashboard') }}"
        class="group flex pt-4 justify-center shrink-0">
        <x-icons.admin-logo class="transition-colors group-hover:text-sp-prairieGreen" />
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
    class="absolute top-0 left-0 h-screen w-64 bg-sp-charcoal text-sp-warmIvory z-50 transform transition-all duration-300 ease-out opacity-0 overflow-hidden flex flex-col">

    <!-- FIXED LOGO -->
    <a href="{{ route('admin.dashboard') }}"
        class="group flex pt-4 justify-center shrink-0">
        <x-icons.admin-logo class="transition-colors duration-300 group-hover:text-sp-prairieGreen" />
    </a>

    <!-- SCROLLING EXPANDED NAV -->
    <div class="flex-1 overflow-y-auto overflow-x-hidden">

        @foreach($visibleNavigation as $item)

            @if(isset($item['children']) && ! empty($item['children']))

                <div class="flex items-center gap-4 px-6 pt-6 pb-2 text-xs uppercase tracking-wide text-sp-alloyGray">

                    <x-dynamic-component
                        :component="'icons.' . $item['icon']"
                        class="w-5 h-5 text-sp-warmIvory" />

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
