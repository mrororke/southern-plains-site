<?php

namespace App\Navigation;

class AdminNavigation
{
    public static function items()
    {
        $items = [

            [
                'label' => 'Dashboard',
                'icon' => 'dashboard',
                'route' => 'admin.dashboard',
                'activeRoute' => 'admin.dashboard',
                'roles' => ['admin'],
                'status' => 'active',
            ],

            [
                'label' => 'Teaching Library',
                'icon' => 'dashboard',
                'roles' => ['admin', 'instructor'],
                'status' => 'active',

                'children' => [

                    [
                        'label' => 'Behaviors',
                        'route' => 'admin.trick-catalog.index',
                        'activeRoute' => 'admin.trick-catalog.*',
                        'status' => 'active',
                    ],

                    [
                        'label' => 'Resources',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.resources.*',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Add Behavior',
                        'route' => 'admin.trick-catalog.create',
                        'activeRoute' => 'admin.trick-catalog.create',
                        'status' => 'active',
                    ],

                    [
                        'label' => 'Categories',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.trick-catalog.categories',
                        'status' => 'coming-soon',
                    ],

                    [
                        'label' => 'Tags',
                        'route' => 'admin.dashboard',
                        'activeRoute' => 'admin.trick-catalog.tags',
                        'status' => 'coming-soon',
                    ],

                ],
            ],

            [
                'label' => 'League',
                'icon' => 'dashboard',
                'route' => 'admin.dashboard',
                'activeRoute' => 'admin.league.*',
                'roles' => ['admin'],
                'status' => 'coming-soon',
            ],

            [
                'label' => 'Events',
                'icon' => 'dashboard',
                'route' => 'admin.dashboard',
                'activeRoute' => 'admin.events.*',
                'roles' => ['admin'],
                'status' => 'coming-soon',
            ],

            [
                'label' => 'CRM',
                'icon' => 'dashboard',
                'route' => 'admin.dashboard',
                'activeRoute' => 'admin.crm.*',
                'roles' => ['admin'],
                'status' => 'coming-soon',
            ],

            [
                'label' => 'Admin',
                'icon' => 'dashboard',
                'route' => 'admin.dashboard',
                'activeRoute' => 'admin.settings.*',
                'roles' => ['admin'],
                'status' => 'coming-soon',
            ],

        ];

        return collect($items)
            ->map(function ($item) {

                $item['status'] = $item['status'] ?? 'active';

                $item['roles'] = $item['roles'] ?? ['admin'];

                return $item;

            })
            ->all();
    }
}