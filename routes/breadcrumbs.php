<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

Breadcrumbs::for('admin.behavior-catalog.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');

    $trail->push('Behavior Catalog');
});
