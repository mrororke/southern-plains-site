# Resource Library Architecture

The Resource Library is designed around a single core concept:

> **A Resource is a living document that evolves over time.**

Resources preserve the history of club communications while remaining reusable for future classes, events, and training. Rather than replacing existing content, new communications are typically created from previous Resources, allowing the club's knowledge base to grow organically.

---

# Design Philosophy

The Resource Library is designed as a knowledge system rather than a traditional document manager.

Its primary purpose is to help instructors quickly find, read, reuse, and evolve communications over time.

The interface prioritizes reading over editing and organization over administration. Resources should feel like articles in an internal knowledge base rather than records in a database.

The Resource Library is deeply integrated with the Behavior Catalog. Resources and Behaviors reference one another, allowing instructors to move naturally between communications and the skills they teach.

---

# Resources

The `resources` table stores the primary content within the Resource Library.

## Fields

| Field | Description |
|---|---|
| `id` | Primary key |
| `title` | Display title of the Resource. For Email Resources, this also serves as the email subject. |
| `body` | Rich text content |
| `resource_category_id` | Category the Resource belongs to |
| `resource_type_id` | Type of Resource |
| `resource_series_id` | Optional Series grouping |
| `based_on_resource_id` | Optional parent Resource from which this Resource was created |
| `session` | Optional delivery session: Spring, Summer, Fall, or Winter |
| `year` | Optional delivery year |
| `week_number` | Optional instructional week |
| `status` | Active or Archived |
| `first_sent` | Optional historical first-send date |
| `created_by` | User who created the Resource |
| `updated_by` | User who last modified the Resource |
| `created_at` | Created timestamp |
| `updated_at` | Updated timestamp |

## Design Decisions

- Resources do not use slugs.
- Resource titles are **not** required to be unique.
- The title doubles as the email subject for Email Resources.
- Resources do not contain summaries.
- Resources do not contain tags.
- Resources do not contain audiences.
- Resources do not store a version number.
- Version history is determined from the Resource Series.
- Session, Year, and Week are optional delivery metadata.
- Delivery metadata is presentation data and is independent from Resource Series.
- Resources may be instructional even when they have no delivery metadata.
- `first_sent` is optional.
- Once populated, `first_sent` represents historical data and should not normally change.
- Resources use a simple lifecycle:
  - Active
  - Archived

---

# Resource Series

Resource Series group multiple versions of the same communication over time.

Examples:

- Welcome
- Week 1
- Graduation
- Trial Reminder

## Fields

| Field | Description |
|---|---|
| `id` | Primary key |
| `name` | Series name |
| `resource_category_id` | Category the Series belongs to |
| `created_by` | User who created the Series |
| `created_at` | Created timestamp |
| `updated_at` | Updated timestamp |

## Design Decisions

- Resources may exist without belonging to a Series.
- Series belong to exactly one Category.
- Series names are editable.
- Series are created automatically when needed.
- There is no dedicated Series management page.
- The combination of Category and Series Name must be unique.
- Series do not use slugs.
- Series do not have descriptions.
- Series do not have statuses.
- Series describe version grouping; delivery metadata describes when a Resource was used.

---

# Resource Categories

Categories organize Resources into major areas of the club.

## Initial Categories

- Tricks
- Fit Dog

## Fields

| Field | Description |
|---|---|
| `id` | Primary key |
| `name` | Category name |
| `is_active` | Determines whether new Resources may use the Category |
| `created_at` | Created timestamp |
| `updated_at` | Updated timestamp |

## Design Decisions

- Categories are fixed lookup values.
- Categories are not managed through the admin interface.
- Active Categories are displayed alphabetically.
- Retired Categories remain attached to historical Resources.
- Retired Categories cannot be assigned to new Resources.

---

# Resource Types

Types describe what kind of Resource is being stored.

## Initial Types

- Email
- Document
- Reference

## Fields

| Field | Description |
|---|---|
| `id` | Primary key |
| `name` | Type name |
| `is_active` | Determines whether the Type is available |
| `created_at` | Created timestamp |
| `updated_at` | Updated timestamp |

## Design Decisions

- Types are fixed lookup values.
- Types are not managed through the admin interface.
- Active Types are displayed alphabetically.
- Retired Types remain attached to historical Resources.
- Types may eventually control application behavior.
- Type names should be treated as stable semantic values.

---

# Resource ↔ Behavior

Resources may reference multiple Behaviors. Likewise, Behaviors may appear in multiple Resources.

**Relationship:** Many-to-Many

## Fields

| Field | Description |
|---|---|
| `id` | Primary key |
| `resource_id` | Related Resource |
| `trick_id` | Related Behavior |
| `created_at` | Created timestamp |
| `updated_at` | Updated timestamp |

## Design Decisions

- Duplicate relationships are not permitted.
- The same Behavior cannot be attached to a Resource more than once.
- No notes are stored on the relationship.
- No sort order is stored.
- No relationship type is stored.

## User Interface

Both modules surface the relationship:

- From a Resource, instructors can immediately view every referenced Behavior.
- From a Behavior, instructors can immediately view every related Resource.

This bidirectional relationship is intended to be a primary navigation path through instructional content.

---

# Resource ↔ Resource

Resources may be connected to other Resources. This relationship is separate from version history.

Examples:

- Welcome Email ↔ Class Expectations
- Week 4 Homework ↔ Instructor Notes
- Trial Reminder ↔ Parking Information

**Relationship:** Many-to-Many (Self-Referencing)

## Fields

| Field | Description |
|---|---|
| `id` | Primary key |
| `resource_id` | First Resource |
| `related_resource_id` | Second Resource |
| `created_at` | Created timestamp |
| `updated_at` | Updated timestamp |

## Design Decisions

- Resources cannot reference themselves.
- Duplicate relationships are not permitted.
- Relationships are treated as bidirectional.
- Before saving, the lower Resource ID is always stored in `resource_id`.
- The higher Resource ID is always stored in `related_resource_id`.
- This relationship is completely separate from `based_on_resource_id`.
- Related Resources are labeled consistently throughout the interface; the former term “Related Reading” is no longer used.

---

# Resource Lineage

Every Resource may optionally reference the Resource it was created from.

This relationship preserves editing history while remaining independent from Resource Series.

Example:

```text
Welcome - Spring 2026
        │
        ▼
Welcome - Summer 2026
```

## Design Decisions

- Lineage is optional.
- Every Resource may have one parent Resource.
- Parent Resources may have many children.
- Deleting a parent Resource sets `based_on_resource_id` to `NULL`.
- Lineage and Resource Series represent different concepts and should never be combined.
- The interface presents Series-based history as **Version History**, replacing the former label “Series History.”

---

# User Interface Architecture

## Desktop

The desktop interface consists of two primary areas.

### Resource Index

The Resource Index occupies approximately 30% of the available width.

Its purpose is to quickly locate Resources through searching, filtering, and browsing. Resources are presented as editorial catalog cards rather than table rows, reinforcing the Resource Library's role as a reading and knowledge system.

The selected Resource is indicated with a colored left border. Search results may deep-link directly into a selected Resource.

### Reader

The Reader occupies approximately 70% of the available width.

Its purpose is to present Resources in a comfortable editorial reading experience.

The Reader is composed of:

- Reader Header
- Resource Body
- Related Behaviors
- Related Resources
- Version History
- About Resource

The desktop Reader provides Copy and Edit actions. Copy prepares the Resource content for reuse in club email; Edit opens the Resource editing workflow.

The Resource Index and Reader scroll independently. Whenever practical, the browser window should not be the primary scrolling container.

## Mobile

The mobile experience intentionally differs from desktop.

```text
Find
  ↓
Tap
  ↓
Read
```

Resources open on a dedicated `show` page rather than within a split layout.

The mobile Reader contains:

- Header and Resource actions
- Resource Body
- Related Behaviors
- Related Resources
- Version History
- About Resource

The mobile experience preserves nearly all desktop reading and navigation functionality while optimizing the layout for vertical reading. Reader actions are exposed where appropriate for the smaller screen.

---

# Reader Actions

Reader actions provide the most common ways to reuse or maintain a Resource without turning the Reader into an administrative form.

## Current Actions

- **Copy Resource** — generates clipboard-ready content for reuse in club email.
- **Edit Resource** — opens the Resource editing workflow.

The desktop Reader exposes both actions directly. The mobile Reader exposes equivalent functionality where appropriate.

Potential future actions include Duplicate, Archive, and Delete.

---

# Global Search

Resources participate in the shared backend search experience.

Search currently indexes:

- Resource Title
- Resource Body

Each Resource search result displays:

- Resource Title
- Delivery metadata, when available
- Resource Type

Selecting a result:

1. Opens the Resource Library.
2. Automatically selects the matching Resource.
3. Scrolls the Reader into view.

Deep-linking preserves the Resource Library's reader-focused architecture while allowing a Resource to be reached from outside the module.

---

# View Architecture

```text
resource-library/

components/
    about-resource.blade.php
    reader.blade.php
    reader-empty-state.blade.php
    reader-header.blade.php
    related-behaviors.blade.php
    related-resources.blade.php
    resource-index.blade.php
    toolbar.blade.php
    version-history.blade.php

partials/
    catalog-card.blade.php
    form.blade.php

create.blade.php
edit.blade.php
index.blade.php
show.blade.php
```

## Design Decisions

- The Reader composes the remaining reading-related components.
- The Toolbar owns both searching and filtering within the Resource Library.
- The editorial catalog card is a reusable partial shared by index rendering.
- Create and Edit share a single form partial.
- `index.blade.php` owns the desktop split-view experience.
- `show.blade.php` owns the dedicated mobile reading experience.
- Components should answer one user question and have a single responsibility.
- “About Resource,” “Related Resources,” and “Version History” are the canonical interface terms.

---

# JavaScript Architecture

```text
resources/js/admin/resource-library/

create.js
edit.js
email.js
index.js
show.js
```

## Responsibilities

| Entry point | Responsibility |
|---|---|
| `create.js` | Create-page interactions |
| `edit.js` | Edit-page interactions |
| `index.js` | Desktop index selection, Reader behavior, and deep-link handling |
| `show.js` | Dedicated mobile Reader behavior |
| `email.js` | Shared clipboard and email-content generation used by multiple pages |

## Design Decisions

- Each page has its own JavaScript entry point.
- `email.js` is shared because clipboard generation is required by more than one Reader experience.
- Shared JavaScript should only be extracted when multiple pages genuinely require the same behavior.
- Page-specific behavior remains close to the page that owns it.
- Helper modules should not be created prematurely.

---

# Backend Architecture

The Resource Library follows the standard Dashboard V2 module architecture.

```text
Architecture
    ↓
Database
    ↓
Seeders
    ↓
Models
    ↓
Validation Requests
    ↓
Services
    ↓
Controllers
    ↓
Routes
    ↓
Views
    ↓
JavaScript
```

Search integration is provided through the shared `BackendSearchService`, allowing Resources to participate in global backend search alongside other searchable modules such as the Behavior Catalog.

## Design Decisions

- Business rules belong within the `ResourceService`.
- Controllers remain thin and coordinate HTTP requests only.
- Models describe relationships and data structure.
- Validation belongs in Form Requests.
- Global search concerns are coordinated through `BackendSearchService` rather than duplicated inside the Resource Library controller.
- Search results deep-link into the appropriate desktop or mobile Resource experience.

---

# Deletion Rules

| Object | Behavior |
|---|---|
| Resource | Deletes Behavior and Resource relationship pivots |
| Behavior | Removes pivot rows only |
| Resource Series | Cannot be deleted while Resources belong to it |
| Resource Category | Cannot be deleted while Resources use it |
| Resource Type | Cannot be deleted while Resources use it |
| Parent Resource | Sets child `based_on_resource_id` to `NULL` |
| User | Cannot be deleted while referenced by `created_by` or `updated_by` |

---

# Initial Seed Data

## Categories

- Tricks
- Fit Dog

## Types

- Email
- Document
- Reference

---

# Migration Order

1. Create `resource_categories`.
2. Create `resource_types`.
3. Create `resource_series`.
4. Create `resources`.
5. Create `resource_trick`.
6. Create `resource_resource`.
7. Seed Categories.
8. Seed Types.

---

# Future Roadmap

Potential future enhancements include:

- Email sending
- Gmail synchronization
- Scheduled email delivery
- Version comparison
- Full-text search ranking
- Resource usage analytics
- Asset Library integration
- Rich media embedding
- Instructor favorites
- Resource collections
- AI-assisted drafting
- Exporting Resources
- Additional Resource Categories
- Additional Resource Types

Placeholder Reader actions may also expand to support a complete duplication, archive, and deletion workflow.
