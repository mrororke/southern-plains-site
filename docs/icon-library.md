# Icon Library

The Southern Plains Sport Dog Club backend uses a custom Blade icon library built from
Lucide icons.

All icons are stored in:

resources/views/components/icons

Icons follow the official Lucide naming convention and are referenced as Blade
components.

Example:

<x-icons.search class="h-4 w-4 text-sp-slate" />

---

# Standards

All icons:

- Use the official Lucide name.
- Use `currentColor`.
- Default to `h-4 w-4`.
- Accept additional classes through `$attributes->class()`.
- Use the standardized Blade SVG wrapper.
- Only contain the Lucide artwork (`path`, `circle`, `rect`, etc.).
- Never contain a nested `<svg>` element.

---

# Default SVG Template

```blade
<svg
    {{ $attributes->class('h-4 w-4')->merge([
        'xmlns' => 'http://www.w3.org/2000/svg',
        'fill' => 'none',
        'viewBox' => '0 0 24 24',
        'stroke' => 'currentColor',
        'stroke-width' => '2',
        'stroke-linecap' => 'round',
        'stroke-linejoin' => 'round',
    ]) }}
>
    <!-- Lucide artwork -->
</svg>
```

---

# Navigation
These icons identify primary navigation sections throughout the backend.

| Component | Primary Use |
|-----------|-------------|
| `<x-icons.layout-dashboard />` | Dashboard |
| `<x-icons.newspaper />` | Content |
| `<x-icons.graduation-cap />` | Training |
| `<x-icons.trophy />` | Events & Sports |
| `<x-icons.paw-print />` | Dogs |
| `<x-icons.rat />` | Rat Management |
| `<x-icons.library-big />` | Resources |
| `<x-icons.send />` | Communication |
| `<x-icons.users-round />` | People |
| `<x-icons.settings />` | Settings |

## Guidelines

- Use these icons only for primary navigation.
- Keep icon usage consistent between desktop and mobile navigation.
- Component names intentionally match the official Lucide icon names.


# Search Result Types
These icons identify the content type of each search result in the global search dropdown.

| Component | Primary Use |
|-----------|-------------|
| `<x-icons.paw-print />` | Behavior |
| `<x-icons.file-text />` | Resource |
| `<x-icons.calendar-days />` | Event |
| `<x-icons.dog />` | Dog |
| `<x-icons.user-round />` | User |

## Guidelines

- Search result icons identify the content type rather than the available action.
- Use one icon consistently for each content type throughout the backend.
- Component names intentionally match the official Lucide icon names.
---

# Tier 3 – Common Actions

These icons represent common user actions throughout the backend. Component names mirror the official Lucide icon names and should not be renamed or aliased.

| Component | Primary Use |
|-----------|-------------|
| `<x-icons.plus />` | Add new content, records, or items |
| `<x-icons.pencil />` | Edit existing content |
| `<x-icons.trash-2 />` | Permanently delete content |
| `<x-icons.eye />` | View or preview content |
| `<x-icons.eye-off />` | Hide content or conceal values |
| `<x-icons.copy />` | Duplicate or copy content |
| `<x-icons.check />` | Confirm an action or indicate completion |
| `<x-icons.circle-check-big />` | Display successful actions or completed states |
| `<x-icons.circle-alert />` | Display warnings or important notices |
| `<x-icons.info />` | Display informational content or contextual help |
| `<x-icons.external-link />` | Open an external website or resource |
| `<x-icons.download />` | Download files or exported content |
| `<x-icons.upload />` | Upload or import content |
| `<x-icons.printer />` | Print pages, reports, or documents |
| `<x-icons.funnel />` | Apply or view filters |
| `<x-icons.funnel-x />` | Clear or reset active filters |
| `<x-icons.refresh-cw />` | Refresh data or reload content |

## Guidelines

- Use these icons only for interactive actions.
- Component names intentionally match the official Lucide icon names.
- Do not create aliases (for example, use `funnel` instead of `filter`).
- Use one icon consistently for each action throughout the backend.
- Prefer `circle-check-big` and `circle-alert` for feedback or status messaging rather than action buttons.

---

# Future Icons

Add new icons only when needed.

Always:

- Use the official Lucide name.
- Keep the standard SVG template.
- Copy only the artwork from Lucide.
- Do not introduce duplicate icons for the same concept.

# Common Mistakes

❌ Copying Lucide's entire SVG.

✅ Keep only the artwork.

---

❌ Hard-coding colors.

✅ Use currentColor.

---

❌ Hard-coding width and height.

✅ Use the default Blade template.

---

❌ Renaming Lucide icons.

✅ Use the official Lucide name as the component name.