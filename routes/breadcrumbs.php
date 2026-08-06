<?php

use App\Models\Trick;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Breadcrumbs::for('admin-v2.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push(
        'Dashboard',
        route('admin-v2.dashboard')
    );
});

/*
|--------------------------------------------------------------------------
| Behavior Catalog
|--------------------------------------------------------------------------
*/

Breadcrumbs::for(
    'admin-v2.behavior-catalog.index',
    function (BreadcrumbTrail $trail) {
        $trail->parent('admin-v2.dashboard');

        $trail->push(
            'Behavior Catalog',
            route('admin-v2.behavior-catalog.index')
        );
    }
);

/*
|--------------------------------------------------------------------------
| Create Behavior
|--------------------------------------------------------------------------
*/

Breadcrumbs::for(
    'admin-v2.behavior-catalog.create',
    function (BreadcrumbTrail $trail) {
        $trail->parent('admin-v2.behavior-catalog.index');

        $trail->push('New Behavior');
    }
);

/*
|--------------------------------------------------------------------------
| View Behavior
|--------------------------------------------------------------------------
*/

Breadcrumbs::for(
    'admin-v2.behavior-catalog.show',
    function (BreadcrumbTrail $trail, Trick $trick) {
        $trail->parent('admin-v2.behavior-catalog.index');

        $trail->push(
            $trick->name,
            route('admin-v2.behavior-catalog.show', $trick)
        );
    }
);

/*
|--------------------------------------------------------------------------
| Edit Behavior
|--------------------------------------------------------------------------
*/

Breadcrumbs::for(
    'admin-v2.behavior-catalog.edit',
    function (BreadcrumbTrail $trail, Trick $trick) {
        $trail->parent(
            'admin-v2.behavior-catalog.show',
            $trick
        );

        $trail->push('Edit');
    }
);