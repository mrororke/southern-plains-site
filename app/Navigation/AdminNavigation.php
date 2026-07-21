<?php

namespace App\Navigation;

class AdminNavigation
{
    public static function items()
    {
        return [
            [
                'label' => 'Dashboard',
                'icon' => 'dashboard',
                'route' => 'admin.dashboard',
                'activeRoute' => 'admin.dashboard',
            ],
        ];
    }
}