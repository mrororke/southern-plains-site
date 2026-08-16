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

Breadcrumbs::for('admin.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push(
        'Dashboard',
        route('admin.dashboard')
    );
});

/*
|--------------------------------------------------------------------------
| Behavior Catalog
|--------------------------------------------------------------------------
*/

Breadcrumbs::for(
    'admin.behavior-catalog.index',
    function (BreadcrumbTrail $trail) {
        $trail->parent('admin.dashboard');

        $trail->push(
            'Behavior Catalog',
            route('admin.behavior-catalog.index')
        );
    }
);

/*
|--------------------------------------------------------------------------
| Create Behavior
|--------------------------------------------------------------------------
*/

Breadcrumbs::for(
    'admin.behavior-catalog.create',
    function (BreadcrumbTrail $trail) {
        $trail->parent('admin.behavior-catalog.index');

        $trail->push('New Behavior');
    }
);

/*
|--------------------------------------------------------------------------
| View Behavior
|--------------------------------------------------------------------------
*/

Breadcrumbs::for(
    'admin.behavior-catalog.show',
    function (BreadcrumbTrail $trail, Trick $trick) {
        $trail->parent('admin.behavior-catalog.index');

        $trail->push(
            $trick->name,
            route('admin.behavior-catalog.show', $trick)
        );
    }
);

/*
|--------------------------------------------------------------------------
| Edit Behavior
|--------------------------------------------------------------------------
*/

Breadcrumbs::for(
    'admin.behavior-catalog.edit',
    function (BreadcrumbTrail $trail, Trick $trick) {
        $trail->parent(
            'admin.behavior-catalog.show',
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
    'admin.resource-library.index',
    function (BreadcrumbTrail $trail) {
        $trail->parent('admin.dashboard');

        $trail->push(
            'Resource Library',
            route('admin.resource-library.index')
        );
    }
);

/*
|--------------------------------------------------------------------------
| Create Resource
|--------------------------------------------------------------------------
*/

Breadcrumbs::for(
    'admin.resource-library.create',
    function (BreadcrumbTrail $trail) {
        $trail->parent('admin.resource-library.index');

        $trail->push('New Resource');
    }
);

/*
|--------------------------------------------------------------------------
| View Resource
|--------------------------------------------------------------------------
*/

Breadcrumbs::for(
    'admin.resource-library.show',
    function (BreadcrumbTrail $trail, Resource $resource) {
        $trail->parent('admin.resource-library.index');

        $trail->push(
            $resource->title,
            route('admin.resource-library.show', $resource)
        );
    }
);

/*
|--------------------------------------------------------------------------
| Edit Resource
|--------------------------------------------------------------------------
*/

Breadcrumbs::for(
    'admin.resource-library.edit',
    function (BreadcrumbTrail $trail, Resource $resource) {
        $trail->parent(
            'admin.resource-library.show',
            $resource
        );

        $trail->push('Edit');
    }
);