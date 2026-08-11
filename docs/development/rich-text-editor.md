# Rich Text Editor

## Purpose

The Rich Text Editor is the shared editing component used throughout Dashboard V2 for long-form text fields.

It provides a consistent editing experience across the application while keeping formatting intentionally lightweight. The editor is designed for documentation, training notes, Resource Library content, and similar administrative writing—not full word processing.

---

## Architecture

The editor consists of three parts:

1. Blade Component
   - `resources/views/components/admin/forms/rich-text.blade.php`
   - Provides the Laravel interface and validation.
   - Supplies the editor with the field name and initial value.

2. Vue Component
   - `resources/js/components/editor/RichTextEditor.vue`
   - Contains the editor toolbar, formatting commands, and Tiptap configuration.

3. JavaScript Registration
   - `resources/js/app.js`
   - Automatically mounts the editor on any element using the `data-admin-rich-text` attribute.

---

## Current Features

The editor currently supports:

- Heading 2
- Bold
- Italic
- Bulleted Lists
- Numbered Lists
- Blockquotes
- Hyperlinks
- Clear Formatting

The toolbar should remain intentionally minimal unless there is a strong documentation-related reason to expand it.

---

## Design Philosophy

This editor is intended for structured documentation.

It is **not** intended to replace Microsoft Word or Google Docs.

Before adding new formatting options, ask:

- Does this improve documentation?
- Will authors realistically use it?
- Does it keep documents readable and consistent?
- Is the added complexity justified?

If the answer is "no," it probably does not belong in the toolbar.

---

## Usage

Use the Blade component whenever a rich text field is required.

```blade
<x-admin.forms.rich-text
    id="body-editor"
    name="body"
    :value="old('body', $resource->body ?? '')"
/>
```

The editor will automatically initialize through `app.js`.

---

## Styling

The editor intentionally provides only basic formatting.

Typography, spacing, lists, and blockquotes should be controlled through shared component styling rather than individual editor instances.

This ensures all rich text content remains visually consistent throughout Dashboard V2.

---

## Future Enhancements

Potential additions include:

- Images
- Tables
- Horizontal Rules
- Code Blocks
- Undo / Redo
- Keyboard shortcut reference

These should only be added when a real workflow requires them.

---

## Maintenance

The Rich Text Editor is a shared component.

Changes made here affect every module that uses it, including:

- Behavior Catalog
- Resource Library
- Teaching Library (future)
- Additional Dashboard V2 modules

Avoid creating module-specific editor variants. If new functionality is needed, improve the shared editor whenever possible.