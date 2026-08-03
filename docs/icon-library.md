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

| Section | Icon |
|----------|------|
| Dashboard | layout-dashboard |
| Content | newspaper |
| Training | graduation-cap |
| Events & Sports | trophy |
| Dogs | dog |
| Rat Management | rat |
| Resources | library-big |
| Communication | send |
| People | users-round |
| Settings | settings |

---

# Search Result Types

| Result | Icon |
|--------|------|
| Behavior | paw-print |
| Resource | file-text |
| Event | calendar-days |
| Dog | dog |
| User | user-round |

---

# Common Actions

| Action | Icon |
|---------|------|
| Search | search |
| Open / View | chevron-right |
| Back | chevron-left |
| Menu | menu |
| Close | x |

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