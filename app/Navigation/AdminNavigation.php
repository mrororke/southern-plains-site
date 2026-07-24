<?php

namespace App\Navigation;

class AdminNavigation
{
    public static function items(): array
    {
        $items = [

            [
                'label' => 'Dashboard',
                'icon' => 'dashboard',
                'route' => 'admin.dashboard',
                'activeRoute' => 'admin.dashboard',
                'roles' => ['admin', 'instructor'],
                'status' => 'active',
            ],

            [
                'label' => 'Content',
                'icon' => 'content-icon',
                'roles' => ['admin'],
                'status' => 'coming-soon',

                'children' => [

                    [
                        'label' => 'Pages',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
                    ],

                    [
                        /* TODO: Current admin route: admin/posts */
                        'label' => 'Posts',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard.*',
                        'status' => 'coming-soon',
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
                'icon' => 'training',
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
                'icon' => 'events-sports',
                'roles' => ['admin'],
                'status' => 'coming-soon',

                'children' => [

                    [
                        'label' => 'Events',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'status' => 'coming-soon',
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
                'icon' => 'dogs',
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
                'icon' => 'rat-management',
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
                'icon' => 'resources',
                'roles' => ['admin', 'instructor'],
                'status' => 'active',

                'children' => [

                    [
                        'label' => 'Documents',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.dashboard',
                        'roles' => ['admin'],
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Behavior Catalog',
                        'route' => 'admin.dashboard-v2.behavior-catalog.index',
                        'activeRoute' => 'admin.dashboard-v2.behavior-catalog.*',
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
                'icon' => 'communication',
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
                'icon' => 'people',
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
