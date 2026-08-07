# Dashboard Conventions

## Naming

V2 feature routes use the feature name rather than legacy terminology.

Example:

admin-v2.behavior-catalog.index
admin-v2.behavior-catalog.create
admin-v2.behavior-catalog.edit

Do not introduce new `trick-catalog` naming into Dashboard V2.

## Blade Views

Desktop views:
resources/views/admin/dashboard-v2/

Mobile views:
resources/views/admin/dashboard-v2/mobile/

Reusable components:
resources/views/components/admin/

## Breadcrumbs

Desktop pages use the global breadcrumb system.

Do not add manual "Back to..." links to desktop pages.

Resource hierarchy:

Dashboard
/ Behavior Catalog
/ Behavior Name
/ Edit

## Icons

Use the Southern Plains Lucide icon library.

Component names must match official Lucide names.

Do not create aliases.

Example:

<x-icons.trash-2 />

not:

<x-icons.trash />

## Feedback Colors

Success:
successGreen #4E7C59

Warning:
warningOchre #C58C2A

Error:
clayRed #B44B42

Info:
prairieBlue #4D718F

## Destructive Actions

Permanent destructive actions may use native browser `confirm()`.

Do not replace them with custom modals solely for visual consistency.

## JavaScript

Shared behavior belongs in reusable modules.

Vite entry points should remain small.

Example:

behavior-catalog/form.js
behavior-catalog/create.js
behavior-catalog/edit.js

Do not duplicate Create/Edit behavior when it can be shared.

## Code Changes

Do not assume route names, paths, variables, or existing implementation.

Check the current code before changing dependent functionality.