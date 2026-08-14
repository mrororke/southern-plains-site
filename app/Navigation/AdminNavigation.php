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
                'route' => 'admin-v2.dashboard',
                'activeRoute' => 'admin-v2.dashboard',
                'roles' => ['admin', 'instructor'],
                'status' => 'active',
            ],

            [
                'label' => 'Content',
                'icon' => 'newspaper',
                'roles' => ['admin'],
                'status' => 'coming-soon',

                'children' => [

                    [
                        'label' => 'Pages',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        /* TODO: Current admin route: admin/posts */
                        'label' => 'Posts',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard.*',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'FAQs',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Media Library',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
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
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Bookings',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard.*',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Attendance',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Resources',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
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
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'League',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard.*',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Registration',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Results',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
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
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Profiles',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard.*',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Health Records',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Owners / Handlers',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
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
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Litters',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard.*',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Health Records',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Timeline Updates',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
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
                        'route' => 'admin-v2.resource-library.index',
                        'activeRoute' => 'admin-v2.resrouce-library.*',
                        'roles' => ['admin', 'instructor'],
                        'status' => 'active',
                    ],

                    [
                        'label' => 'Behavior Catalog',
                        'route' => 'admin-v2.behavior-catalog.index',
                        'activeRoute' => 'admin-v2.behavior-catalog.*',
                        'roles' => ['admin', 'instructor'],
                        'status' => 'active',
                    ],

                    [
                        'label' => 'Downloads',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
                        'roles' => ['admin'],
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Guides',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
                        'roles' => ['admin'],
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Forms',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
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
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Templates',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard.*',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Enquiries',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Notifications',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
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
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Clients',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard.*',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Instructors',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Roles',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
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
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Email',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard.*',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Payments',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Integrations',
                        'route' => 'admin-v2.dashboard',
                        'activeRoute' => 'admin-v2.dashboard',
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
