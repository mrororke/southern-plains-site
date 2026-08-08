<?php

use App\Models\Trick;
use App\Models\ResourceLibrary\Resource;
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

/*
|--------------------------------------------------------------------------
| Resource Library
|--------------------------------------------------------------------------
*/

Breadcrumbs::for(
    'admin-v2.resource-library.index',
    function (BreadcrumbTrail $trail) {
        $trail->parent('admin-v2.dashboard');

        $trail->push(
            'Resource Library',
            route('admin-v2.resource-library.index')
        );
    }
);

/*
|--------------------------------------------------------------------------
| Create Resource
|--------------------------------------------------------------------------
*/

Breadcrumbs::for(
    'admin-v2.resource-library.create',
    function (BreadcrumbTrail $trail) {
        $trail->parent('admin-v2.resource-library.index');

        $trail->push('New Resource');
    }
);

/*
|--------------------------------------------------------------------------
| View Resource
|--------------------------------------------------------------------------
*/

Breadcrumbs::for(
    'admin-v2.resource-library.show',
    function (BreadcrumbTrail $trail, Resource $resource) {
        $trail->parent('admin-v2.resource-library.index');

        $trail->push(
            $resource->title,
            route('admin-v2.resource-library.show', $resource)
        );
    }
);

/*
|--------------------------------------------------------------------------
| Edit Resource
|--------------------------------------------------------------------------
*/

Breadcrumbs::for(
    'admin-v2.resource-library.edit',
    function (BreadcrumbTrail $trail, Resource $resource) {
        $trail->parent(
            'admin-v2.resource-library.show',
            $resource
        );

        $trail->push('Edit');
    }
);