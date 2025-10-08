# Southern Plains Website

**Project:** Southern Plains – Blog-first, mobile-first website  
**Tech Stack:** Laravel Breeze, Tailwind CSS, MySQL/PostgreSQL (local)  
**Repository:** Private – personal use only  

---

## Project Overview

Southern Plains is a **local-first, blog-centric website** built with Laravel Breeze.  
The initial focus is on **local development**, with dynamic blog functionality, contact forms, and responsive mobile-first design.  

Optional future enhancements include search, comments, analytics, and performance optimizations.  
Hosting and production workflows will be added once a hosting solution is selected.

---

## Milestones / Releases

1. Local Project Setup  
2. Content & SEO Planning  
3. Wireframing & Layout  
4. Frontend Templates (Local)  
5. Blog & CMS Functionality (Local)  
6. Contact Form & Newsletter (Local)  
7. Local Testing & QA  
8. Optional Future Enhancements (Local)  

> All detailed tasks and checklists are tracked in GitHub Issues/Projects.

---

## Daily Dev Routine (Local)

### 1. Pull Latest Changes
```
git pull origin main
```

### 2. Install/Update Dependencies
```
composer install
npm install
npm run dev
```

Only run composer or install if new dependencies have been added

### 3. Ensure Environment is Set
Verify .env file exists and that local databsae credentials are correct
Generate application key if needed
```
php artisan key:generate
```

### 4. Run Migrations/Seeders (if needed)
```
php artisan migrate
php artisan db:seed
```
Run only if there are new migrations, or fresh seed data is needed

### 5. Start Local Server
``` 
php artisan serve
```
Visit http://localhost:8000 to preview the site.

### 6. Optional: Watch Frontend Assets
```
npm run watch
```

Automatically rebuild CSS/JS when you make changes

### 7. Daily Workflow Tips
* Work on a new branch for each feature or bug fix.
* Track tasks in GitHub Issues/Projects.
* Test changes in multiple screen sizes (mobile-first).
* Commit frequently with clear messages.

---
#### Development Notes
Project is private, intended for personal/local development only.
.gitignore includes Laravel defaults (vendor/, node_modules/, storage/, .env, etc.)
Tailwind CSS is used for styling; run npm run dev or npm run watch during development
Hosting, staging, and production branches will be added later

---

#### Optional Future Enhancements
Search functionality for blog posts
Related posts suggestions
Comment system
Analytics integration (Google Analytics or Plausible)
Newsletter automation and segmentation
Accessibility and performance optimization

---

## Quick Start – Local Development

### 1. Clone the Repository
```
git clone git@github.com:YOUR_USERNAME/southern-plains-site.git
cd southern-plains-site
```

### 2. Install Dependencies
```
composer install
npm install
npm run dev

```

### 3. Configure Environment
Copy .env.example to .env
```
composer install
npm install
npm run dev
```

Set your local database credentials and other environment variables in .env
Generate application key

```
php artisan key:generate
```

### 4. Set Up Database
Create local database for project
Run migrations and seeders
```
php artisan migrate --seed
```

### 5. Run the Local Server
```
php artisan serve
```

Visit http://localhost:8000 in browser.

