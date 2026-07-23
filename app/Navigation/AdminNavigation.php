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