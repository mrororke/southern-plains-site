@props([
    'navigation',
])

@php
    $user = auth()->user();

    /*
    |--------------------------------------------------------------------------
    | Collect user roles
    |--------------------------------------------------------------------------
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
                        return data_get($role, 'name')
                            ?? data_get($role, 'slug')
                            ?? $role;
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

    /*
    |--------------------------------------------------------------------------
    | Role checker
    |--------------------------------------------------------------------------
    */

    $hasRole = function ($role) use ($user, $normalizedRoles) {
        $role = strtolower(trim((string) $role));

        if (! $user) {
            return false;
        }

        if (method_exists($user, 'hasRole')) {
            try {
                if (
                    $user->hasRole($role)
                    || $user->hasRole(ucfirst($role))
                ) {
                    return true;
                }
            } catch (\Throwable $e) {
                // Continue checking other role formats.
            }
        }

        return $normalizedRoles->contains($role);
    };

    $isAdmin =
        $hasRole('admin')
        || data_get($user, 'is_admin') === true
        || data_get($user, 'is_admin') === 1
        || ($user && method_exists($user, 'isAdmin') && $user->isAdmin());

    $isInstructor =
        $hasRole('instructor')
        || data_get($user, 'is_instructor') === true
        || data_get($user, 'is_instructor') === 1
        || ($user && method_exists($user, 'isInstructor') && $user->isInstructor());

    /*
    |--------------------------------------------------------------------------
    | Check whether the user may see a navigation item
    |--------------------------------------------------------------------------
    */

    $roleAllowed = function (array $item) use ($isAdmin, $isInstructor): bool {
        $roles = collect($item['roles'] ?? ['admin'])
            ->map(function ($role) {
                return strtolower(trim((string) $role));
            });

        if ($isAdmin && $roles->contains('admin')) {
            return true;
        }

        if ($isInstructor && $roles->contains('instructor')) {
            return true;
        }

        return false;
    };

    /*
    |--------------------------------------------------------------------------
    | Build the flat mobile navigation
    |--------------------------------------------------------------------------
    |
    | Mobile navigation:
    | - shows active links only;
    | - hides disabled and coming-soon links;
    | - does not show parent section headings;
    | - flattens active child links into the main list.
    */

    $mobileNavigation = collect($navigation)
        ->flatMap(function ($item) use ($roleAllowed) {

            if (! empty($item['children'])) {
                return collect($item['children'])
                    ->filter(function ($child) use ($roleAllowed) {
                        return ($child['status'] ?? 'active') === 'active'
                            && ! ($child['disabled'] ?? false)
                            && ! empty($child['route'])
                            && $roleAllowed($child);
                    })
                    ->values()
                    ->all();
            }

            if (
                ($item['status'] ?? 'active') === 'active'
                && ! ($item['disabled'] ?? false)
                && ! empty($item['route'])
                && $roleAllowed($item)
            ) {
                return [$item];
            }

            return [];
        })
        ->values();
@endphp

<nav
    x-show="menuOpen"
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="-translate-y-full"
    x-transition:enter-end="translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="translate-y-0"
    x-transition:leave-end="-translate-y-full"
    class="absolute left-0 top-0 z-40 w-full bg-sp-warmIvory pt-20 shadow-md"
>
    <div class="px-6 py-4">
        <!-- TODO: Replace with the shared global search component. -->
        <input
            type="text"
            name="globalSearch"
            value=""
            placeholder="Search anything..."
            class="block w-full rounded-md border border-sp-charcoal bg-transparent
                   placeholder:text-md placeholder:italic placeholder:text-sp-charcoal
                   focus:border-sp-charcoal"
        >
    </div>

    @foreach($mobileNavigation as $item)
        <x-admin.mobile.nav-link
            :href="route($item['route'])"
            :active="request()->routeIs($item['activeRoute'])"
        >
            {{ $item['label'] }}
        </x-admin.mobile.nav-link>
    @endforeach

    <x-admin.mobile.nav-link
        :href="route('profile.edit')"
        :active="request()->routeIs('profile.*')"
    >
        Profile
    </x-admin.mobile.nav-link>
</nav>