# Southern Plains Dashboard

Dashboard V2 is the replacement administration interface for the Southern Plains Sport Dog Club website.

## Stack

- Laravel
- Blade
- Tailwind CSS
- Alpine.js
- Vue where required for rich editors
- Vite
- Lucide icons
- Flowbite where appropriate

## Core Paths

Desktop shell:
resources/views/admin/dashboard-v2/desktop.blade.php

Mobile shell:
resources/views/admin/dashboard-v2/mobile/shell.blade.php

Admin components:
resources/views/components/admin

Admin JavaScript:
resources/js/admin

Shared Alpine modules:
resources/js/alpine

Routes:
routes/web.php

Breadcrumbs:
routes/breadcrumbs.php

## Documentation

- conventions.md — project-wide Dashboard V2 rules
- components.md — reusable admin components
- modules/behavior-catalog.md — Behavior Catalog implementation
- decisions/ — architectural decisions worth preserving