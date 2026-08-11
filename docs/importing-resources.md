# Importing Resources

This document describes the standard process for importing Resources into the Resource Library.

The importer is intended for migrating historical emails, documents, and reference material into the application while ensuring all business rules continue to be enforced through the `ResourceService`.

---

# Import Workflow

```text
CSV
    ↓
Import Command
    ↓
Validation
    ↓
ResourceService
    ↓
Database
```

Resources should never be imported directly into the database through MySQL or TablePlus.

All imports should go through the Artisan command.

---

# Import File Location

Import files should be stored inside the project.

```text
storage/
└── imports/
    └── resource-library-import.csv
```

Keeping import files inside the project makes them easy to locate, version, and rerun during development.

---

# CSV Format

The importer expects the following columns.

| Column | Required | Notes |
|---------|----------|-------|
| title | Yes | Resource title. Also used as the email subject. |
| category | Yes | Matches an existing Resource Category by name. |
| type | Yes | Matches an existing Resource Type by name. |
| series | No | Creates or finds the appropriate Resource Series. |
| first_sent | No | Historical first send date (`YYYY-MM-DD`). |
| status | Yes | `Active` or `Archived`. Case-insensitive. |
| body | Yes | HTML or rich text content. |
| notes | No | Personal migration notes. Ignored by the importer. |

Example:

```csv
title,category,type,series,first_sent,status,body,notes
Week 1 Homework,Tricks,Email,Week 1,2026-05-07,Active,"<p>Welcome...</p>",Connect to behaviors
```

---

# Import Command

```bash
php artisan resource-library:import storage/imports/resource-library-import.csv --user=1
```

Where:

- `storage/imports/resource-library-import.csv` is the CSV file to import.
- `--user=1` attributes all imported Resources and newly created Resource Series to User ID 1.

---

# Duplicate Protection

The importer prevents duplicate Resources from being imported.

A Resource is considered a duplicate when:

- The title matches.
- The `first_sent` value matches.
- Resources without a `first_sent` date are compared using `NULL`.

Duplicate Resources are skipped.

Example:

```text
⚠ Week 1 Homework already exists. Skipping.
```

---

# Data Normalization

Before validation, the importer normalizes:

- Category names
- Type names
- Status values

The following values are treated as equivalent:

```text
Active
ACTIVE
active
```

and

```text
Archived
ARCHIVED
archived
```

Category and Type lookups ignore capitalization and surrounding whitespace.

---

# Import Notes

The `notes` column is not stored in the database.

It exists solely as a migration aid.

When present, Notes are displayed in the terminal during import.

Example:

```text
✔ Week 6 Homework

  Note: Connect to behaviors
```

This allows migration reminders without polluting Resource data.

---

# Business Rules

The importer always creates Resources through the `ResourceService`.

This ensures imported Resources follow the same business rules as Resources created through the application.

The importer:

- Validates every row.
- Finds existing Categories.
- Finds existing Types.
- Creates or finds Resource Series.
- Creates Resources.
- Assigns the specified User as both `created_by` and `updated_by`.

---

# Error Handling

The importer continues processing when individual rows fail.

Each failed row reports the reason for failure.

Example:

```text
✘ Week 8 Homework

Unknown Category 'Nosework'
```

The remaining rows continue importing.

---

# Import Summary

When the import completes, a summary is displayed.

Example:

```text
Import complete.

+-----------+-------+
| Result    | Count |
+-----------+-------+
| Imported  | 98    |
| Skipped   | 2     |
| Notes     | 14    |
+-----------+-------+
```

---

# Recommended Workflow

1. Export or prepare the CSV.
2. Save it to `storage/imports/`.
3. Review Category, Type, and Status values.
4. Run the Artisan import command.
5. Review any Notes displayed during import.
6. Verify the imported Resources within the Resource Library.

This process should always be used for historical imports and large batches of Resources.

Direct database imports are not recommended.