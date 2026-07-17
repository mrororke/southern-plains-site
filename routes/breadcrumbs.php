<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin.dashboard-v2', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard');
});