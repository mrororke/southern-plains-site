# Icon Library

## August 5, 2026 - Dashboard V2 Icon Library v1.0 Complete

The Southern Plains Dashboard V2 icon library uses Lucide icons.

## Naming Convention

- Blade component names mirror the official Lucide icon names.
- Do not create aliases (for example, use `funnel` instead of `filter`).
- If an icon's meaning differs from its Lucide name (for example, `rotate-ccw` is used for History), document the intended usage in this guide rather than renaming the component.

All icons are stored in:

`resources/views/components/icons`

Icons follow the official Lucide naming convention and are referenced as Blade components.

Example:

```blade
<x-icons.search class="h-4 w-4 text-sp-slate" />
```

---

# Standards

All icons:

- Use the official Lucide name.
- Use `currentColor`.
- Default to `h-4 w-4`.
- Accept additional classes through `$attributes->class()`.
- Use the standardized Blade SVG wrapper.
- Only contain the Lucide artwork (`path`, `circle`, `rect`, `line`, `polyline`, etc.).
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

---

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
| `<x-icons.circle-check-big />` | Success messages or completed states |
| `<x-icons.circle-alert />` | Warnings or important notices |
| `<x-icons.info />` | Informational content or contextual help |
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

# Tier 4 – Content

These icons represent content types and organizational elements throughout the backend. Component names mirror the official Lucide icon names and should not be renamed or aliased.

| Component | Primary Use |
|-----------|-------------|
| `<x-icons.image />` | Images or image galleries |
| `<x-icons.video />` | Videos or video content |
| `<x-icons.link />` | Hyperlinks or connected resources |
| `<x-icons.book-open />` | Learning materials, guides, or documentation |
| `<x-icons.notebook />` | Notes, journals, or written records |
| `<x-icons.bookmark />` | Saved or bookmarked content |
| `<x-icons.tags />` | Categories, labels, or tags |
| `<x-icons.folder />` | A single folder or collection |
| `<x-icons.folders />` | Multiple folders or grouped collections |

## Guidelines

- Use these icons to identify content types rather than user actions.
- Reserve `book-open` for published learning content and documentation.
- Reserve `notebook` for editable notes or records.
- Use `folder` for a single collection and `folders` when representing multiple collections or a library.
- Component names intentionally match the official Lucide icon names.

---

# Tier 5 – Status, Security, & Utility

These icons represent application status, security, favorites, and utility functions throughout the backend. Component names mirror the official Lucide icon names and should not be renamed or aliased.

| Component | Primary Use |
|-----------|-------------|
| `<x-icons.clock />` | Time, schedules, or timestamps |
| `<x-icons.rotate-ccw />` | History, revision history, or previous activity |
| `<x-icons.sparkles />` | AI features, enhancements, or featured content |
| `<x-icons.star />` | Favorites, featured items, or ratings |
| `<x-icons.heart />` | Likes, saved favorites, or health-related content |
| `<x-icons.flag />` | Flags, markers, or reporting content |
| `<x-icons.shield />` | Security, permissions, or protected content |
| `<x-icons.lock />` | Locked or restricted content |
| `<x-icons.lock-open />` | Unlocked or publicly accessible content |
| `<x-icons.globe />` | Public visibility, websites, or global settings |

## Guidelines

- Use these icons to communicate state or utility rather than navigation.
- Reserve `rotate-ccw` for history and previous activity.
- Reserve `sparkles` exclusively for AI-powered features or intelligent enhancements.
- Use `star` for favorites or featured content, not completed tasks.
- Use `heart` only where it represents affection, wellness, or user favorites—not as a substitute for `star`.
- Use `shield`, `lock`, and `lock-open` consistently to represent security and permissions.
- Component names intentionally match the official Lucide icon names.

---

# Tier 6 – Form Controls

These icons represent form elements, selection controls, sorting, and drag interactions throughout the backend. Component names mirror the official Lucide icon names and should not be renamed or aliased.

| Component | Primary Use |
|-----------|-------------|
| `<x-icons.square-check />` | Checked checkbox or selected option |
| `<x-icons.square />` | Unchecked checkbox |
| `<x-icons.circle />` | Unselected radio button |
| `<x-icons.circle-dot />` | Selected radio button |
| `<x-icons.chevrons-up-down />` | Sortable columns, dropdowns, or reorder indicators |
| `<x-icons.move />` | Drag handles or repositioning items |

## Guidelines

- Use these icons to represent form controls and interactive selection states.
- Reserve `square` and `square-check` for checkbox interactions.
- Reserve `circle` and `circle-dot` for radio button interactions.
- Use `chevrons-up-down` to indicate sortable content or expandable selection lists.
- Reserve `move` exclusively for drag-and-drop interactions or repositioning content.
- Component names intentionally match the official Lucide icon names.

---

# Design Philosophy

The icon library is intentionally curated rather than exhaustive.

Only icons that are actively used within the application should be added to the library. This keeps icon selection consistent, prevents duplicate concepts, and makes the design system easier to maintain over time.

---

# Future Icons

Add new icons only when they are needed by the application.

Before adding a new icon:

- Confirm an existing icon does not already communicate the same concept.
- Use the official Lucide name.
- Keep the standard SVG template.
- Copy only the artwork from Lucide.
- Do not introduce duplicate icons for the same concept.

---

# Reserved Meanings

These icons have standardized meanings throughout the application and should not be repurposed for different concepts.

| Component | Reserved Meaning |
|-----------|------------------|
| `<x-icons.search />` | Search |
| `<x-icons.funnel />` | Apply filters |
| `<x-icons.funnel-x />` | Clear filters |
| `<x-icons.rotate-ccw />` | History or previous activity |
| `<x-icons.refresh-cw />` | Refresh data |
| `<x-icons.copy />` | Duplicate or copy |
| `<x-icons.external-link />` | Open an external resource |
| `<x-icons.printer />` | Print |
| `<x-icons.circle-check-big />` | Success |
| `<x-icons.circle-alert />` | Warning |
| `<x-icons.info />` | Informational content |
| `<x-icons.shield />` | Security or permissions |
| `<x-icons.lock />` | Restricted or locked content |
| `<x-icons.lock-open />` | Unlocked or publicly accessible content |
| `<x-icons.sparkles />` | AI-powered features or enhancements |

---

# Common Mistakes

❌ Copying Lucide's entire SVG.
✅ Keep only the artwork.

---

❌ Hard-coding colors.
✅ Use `currentColor`.

---

❌ Hard-coding width and height.
✅ Use the default Blade template.

---

❌ Renaming Lucide icons.
✅ Use the official Lucide name as the component name.