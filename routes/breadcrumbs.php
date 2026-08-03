<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin-v2.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin-v2.dashboard'));
});

Breadcrumbs::for('admin-v2.behavior-catalog.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-v2.dashboard');

    $trail->push('Behavior Catalog');
});
