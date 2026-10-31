<?php

namespace App\Navigation;

class AdminNavigation
{
    public static function items(): array
    {
        $items = [

            [
                'label' => 'Dashboard',
                'icon' => 'layout-dashboard',
                'route' => 'admin.dashboard',
                'activeRoute' => 'admin.dashboard',
                'roles' => ['admin', 'instructor'],
                'status' => 'active',
            ],

            [
                'label' => 'Content',
                'icon' => 'newspaper',
                'roles' => ['admin'],
                'status' => 'active',

                'children' => [

                    [
                        'label' => 'Pages',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Learn',
                        'route' => 'admin.learn.index',
                        'activeRoute' => 'admin.learn.*',
                        'status' => 'active',
                    ],

                    [
                        'label' => 'FAQs',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Media Library',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                ],
            ],

            [
                'label' => 'Training',
                'icon' => 'graduation-cap',
                'roles' => ['admin'],
                'status' => 'coming-soon',

                'children' => [

                    [
                        'label' => 'Courses',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Bookings',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard.*',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Attendance',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Resources',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                ],
            ],

            [
                'label' => 'Events & Sports',
                'icon' => 'trophy',
                'roles' => ['admin'],
                'status' => 'coming-soon',

                'children' => [

                    [
                        'label' => 'Events',
                        'route' => 'admin.events-v2.index',
                        'activeRoute' => 'admin.events-v2.*',
                        'status' => 'active',
                    ],

                    [
                        'label' => 'League',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard.*',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Registration',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Results',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                ],
            ],

            [
                'label' => 'Dogs',
                'icon' => 'paw-print',
                'roles' => ['admin'],
                'status' => 'coming-soon',

                'children' => [

                    [
                        'label' => 'All Dogs',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Profiles',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard.*',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Health Records',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Owners / Handlers',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                ],
            ],

            [
                /* TODO: Current route on live site: admin/rats */
                'label' => 'Rat Management',
                'icon' => 'rat',
                'roles' => ['admin'],
                'status' => 'coming-soon',

                'children' => [

                    [
                        'label' => 'Rats',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Litters',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard.*',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Health Records',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Timeline Updates',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                ],
            ],

            [
                'label' => 'Resources',
                'icon' => 'library-big',
                'roles' => ['admin', 'instructor'],
                'status' => 'active',

                'children' => [

                    [
                        'label' => 'Resource Library',
                        'route' => 'admin.resource-library.index',
                        'activeRoute' => 'admin.resource-library.*',
                        'roles' => ['admin', 'instructor'],
                        'status' => 'active',
                    ],

                    [
                        'label' => 'Behavior Catalog',
                        'route' => 'admin.behavior-catalog.index',
                        'activeRoute' => 'admin.behavior-catalog.*',
                        'roles' => ['admin', 'instructor'],
                        'status' => 'active',
                    ],

                    [
                        'label' => 'Downloads',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'roles' => ['admin'],
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Guides',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'roles' => ['admin'],
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Forms',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'roles' => ['admin'],
                        'status' => 'coming-soon',
                    ],

                ],
            ],

            [
                'label' => 'Communication',
                'icon' => 'send',
                'roles' => ['admin'],
                'status' => 'coming-soon',

                'children' => [

                    [
                        'label' => 'Emails',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Templates',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard.*',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Enquiries',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Notifications',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                ],
            ],

            [
                'label' => 'People',
                'icon' => 'users-round',
                'roles' => ['admin'],
                'status' => 'coming-soon',

                'children' => [

                    [
                        'label' => 'Users',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Clients',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard.*',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Instructors',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Roles',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                ],
            ],

            [
                'label' => 'Settings',
                'icon' => 'settings',
                'roles' => ['admin'],
                'status' => 'coming-soon',

                'children' => [

                    [
                        'label' => 'General',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Email',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard.*',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Payments',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Integrations',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                ],
            ],

        ];

        return collect($items)
            ->map(function ($item) {

                $item['status'] = $item['status'] ?? 'active';
                $item['roles'] = $item['roles'] ?? ['admin'];
                $item['disabled'] = $item['status'] !== 'active';

                if (isset($item['children'])) {
                    $item['children'] = collect($item['children'])
                        ->map(function ($child) use ($item) {

                            $child['status'] = $child['status'] ?? $item['status'] ?? 'active';
                            $child['roles'] = $child['roles'] ?? $item['roles'] ?? ['admin'];
                            $child['disabled'] = $child['status'] !== 'active';

                            return $child;
                        })
                        ->all();
                }

                return $item;
            })
            ->all();
    }
}
