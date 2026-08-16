# Admin Components

## Page Header

Component:

<x-admin.layout.page-header />

Path:

resources/views/components/admin/layout/page-header.blade.php

Purpose:

Provides the standard page title and optional description for Dashboard V2 pages.

Example:

<x-admin.layout.page-header
    title="Create Behavior"
    description="Add the behavior details, assign categories, and include any helpful video resources."
/>

---

## Form Section

Component:

<x-admin.forms.section />

Purpose:

Provides the standard card structure used for admin form sections.

Supports:

- eyebrow
- title
- description
- optional header divider
- optional actions slot

---

## Category Selector

Component:

<x-admin.forms.category-selector />

Purpose:

Searchable multi-select checkbox interface.

JavaScript:

resources/js/alpine/searchableCheckboxList.js

Used by:

- Behavior Create
- Behavior Edit

---

## Rich Text

Component:

<x-admin.forms.rich-text />

Purpose:

Mount point for the reusable AdminEditor Vue editor.

JavaScript mounting occurs globally in:

resources/js/app.js

Hook:

data-admin-rich-text

---

## Validation Summary

<x-admin.forms.validation-summary />

Displays Laravel validation errors at the top of a form.

---

## Field Error

<x-admin.forms.field-error name="name" />

Displays validation errors for an individual field.

---

## Form Actions

<x-admin.forms.actions />

Provides standard Cancel and Submit actions.

---

## Danger Zone

<x-admin.forms.danger-zone />

Provides a visually separated destructive-action area.

---

## Flash Feedback

<x-admin.feedback.flash />

Supported states:

success
warning
error
info