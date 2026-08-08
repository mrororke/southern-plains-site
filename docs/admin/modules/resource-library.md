# Database Architecture

The Resource Library is designed around a single core concept:

> **A Resource is a living document that evolves over time.**

Resources preserve the history of club communications while remaining reusable for future classes, events, and training. Rather than replacing existing content, new communications are typically created from previous Resources, allowing the club's knowledge base to grow organically.

---

# Resources

The `resources` table stores the primary content within the Resource Library.

## Fields

| Field | Description |
|--------|-------------|
| id | Primary key |
| title | Display title of the Resource. For emails, this also serves as the email subject. |
| body | Rich text content |
| resource_category_id | Category the Resource belongs to |
| resource_type_id | Type of Resource |
| resource_series_id | Optional Series grouping |
| based_on_resource_id | Optional parent Resource this Resource was created from |
| status | Active or Archived |
| first_sent | Optional historical first-send date |
| created_by | User that created the Resource |
| updated_by | User that last modified the Resource |
| created_at | Created timestamp |
| updated_at | Updated timestamp |

## Design Decisions

- Resources do not use slugs.
- Resource titles are **not** required to be unique.
- The title doubles as the email subject for email Resources.
- Resources do not contain summaries.
- Resources do not contain tags.
- Resources do not contain audiences.
- Resources do not store a version number.
- Version history is determined from the Resource Series.
- `first_sent` is optional.
- Once populated, `first_sent` represents historical data and should not normally change.
- Resources use a simple lifecycle:
    - Active
    - Archived.

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
|--------|-------------|
| id | Primary key |
| name | Series name |
| resource_category_id | Category the Series belongs to |
| created_by | User that created the Series |
| created_at | Created timestamp |
| updated_at | Updated timestamp |

## Design Decisions

- Resources may exist without belonging to a Series.
- Series belong to exactly one Category.
- Series names are editable.
- Series are created automatically when needed.
- There is no dedicated Series management page.
- The combination of Category + Series Name must be unique.
- Series do not use slugs.
- Series do not have descriptions.
- Series do not have statuses.

---

# Resource Categories

Categories organize Resources into major areas of the club.

## Initial Categories

- Tricks
- Fit Dog

## Fields

| Field | Description |
|--------|-------------|
| id | Primary key |
| name | Category name |
| is_active | Determines whether new Resources may use the Category |
| created_at | Created timestamp |
| updated_at | Updated timestamp |

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
|--------|-------------|
| id | Primary key |
| name | Type name |
| is_active | Determines whether the Type is available |
| created_at | Created timestamp |
| updated_at | Updated timestamp |

## Design Decisions

- Types are fixed lookup values.
- Types are not managed through the admin interface.
- Active Types are displayed alphabetically.
- Retired Types remain attached to historical Resources.
- Types may eventually control application behavior.
- Type names should be treated as stable semantic values.

---

# Resource ↔ Behavior

Resources may reference multiple Behaviors.

Likewise, Behaviors may appear in multiple Resources.

**Relationship:** Many-to-Many

## Fields

| Field | Description |
|--------|-------------|
| id | Primary key |
| resource_id | Related Resource |
| trick_id | Related Behavior |
| created_at | Created timestamp |
| updated_at | Updated timestamp |

## Design Decisions

- Duplicate relationships are not permitted.
- The same Behavior cannot be attached to a Resource more than once.
- No notes are stored on the relationship.
- No sort order is stored.
- No relationship type is stored.

---

# Resource ↔ Resource

Resources may be connected to other Resources.

This relationship is separate from version history.

Examples:

- Welcome Email ↔ Class Expectations
- Week 4 Homework ↔ Instructor Notes
- Trial Reminder ↔ Parking Information

**Relationship:** Many-to-Many (Self Referencing)

## Fields

| Field | Description |
|--------|-------------|
| id | Primary key |
| resource_id | First Resource |
| related_resource_id | Second Resource |
| created_at | Created timestamp |
| updated_at | Updated timestamp |

## Design Decisions

- Resources cannot reference themselves.
- Duplicate relationships are not permitted.
- Relationships are treated as bidirectional.
- Before saving, the lower Resource ID is always stored in `resource_id`.
- The higher Resource ID is always stored in `related_resource_id`.
- This relationship is completely separate from `based_on_resource_id`.

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

---

# Deletion Rules

| Object | Behavior |
|---------|----------|
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

1. Create `resource_categories`
2. Create `resource_types`
3. Create `resource_series`
4. Create `resources`
5. Create `resource_trick`
6. Create `resource_resource`
7. Seed Categories
8. Seed Types