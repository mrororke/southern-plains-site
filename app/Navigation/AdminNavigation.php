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
                'icon' => 'book-open',
                'route' => 'admin.trick-catalog.index',
                'activeRoute' => 'admin.trick-catalog.*',
                'roles' => ['admin', 'instructor'],
            ],

            [
                'label' => 'Resources',
                'icon' => 'folder',
                'route' => 'admin.trick-catalog.index',
                'activeRoute' => 'admin.trick-catalog.*',
                'roles' => ['admin', 'instructor'],
            ],

            [
                'label' => 'Add Behavior',
                'icon' => 'plus',
                'route' => 'admin.trick-catalog.create',
                'activeRoute' => 'admin.trick-catalog.create',
                'roles' => ['admin', 'instructor'],
            ],

            [
                'label' => 'League',
                'icon' => 'trophy',
                'route' => '#',
                'activeRoute' => 'admin.league.*',
                'status' => 'coming-soon',
                'roles' => ['admin'],
            ],

            [
                'label' => 'Users',
                'icon' => 'users',
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