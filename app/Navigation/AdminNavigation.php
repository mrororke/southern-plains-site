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
            ],

            [
                'label' => 'Behaviors',
                'icon' => 'dashboard',
                'route' => 'admin.trick-catalog.index',
                'activeRoute' => 'admin.trick-catalog.*',
                'roles' => ['admin', 'instructor'],
            ],

            [
                'label' => 'Resources',
                'icon' => 'dashboard',
                'route' => 'admin.trick-catalog.index',
                'activeRoute' => 'admin.trick-catalog.*',
                'roles' => ['admin', 'instructor'],
            ],

            [
                'label' => 'Add Behavior',
                'icon' => 'dashboard',
                'route' => 'admin.trick-catalog.create',
                'activeRoute' => 'admin.trick-catalog.create',
                'roles' => ['admin', 'instructor'],
            ],

            [
                'label' => 'League',
                'icon' => 'dashboard',
                'route' => '#',
                'activeRoute' => 'admin.league.*',
                'status' => 'coming-soon',
                'roles' => ['admin'],
            ],

            [
                'label' => 'Users',
                'icon' => 'dashboard',
                'route' => '#',
                'activeRoute' => 'admin.users.*',
                'status' => 'coming-soon',
                'roles' => ['admin'],
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