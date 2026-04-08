# Oromia Bureau of Agriculture (OBA) Website – Laravel + Blade

This repository contains a Laravel-oriented implementation plan and starter code for an OBA website inspired by the information architecture and visual tone of [moa.gov.et](https://www.moa.gov.et/), using:

- **Backend:** Laravel (PHP 8.x)
- **Frontend:** Blade templates + CSS
- **Database:** MySQL/MariaDB
- **Core modules:** Vacancies, Bill Announcements, News, Employee Registry, and Admin-facing content management foundations.

## Included in this starter

- Public pages and controllers for:
  - Home
  - Vacancies (list + detail)
  - Bill announcements (list + detail)
  - News (list + detail)
  - Employees (summary + list)
- Database schema migrations aligned with your proposal.
- Eloquent models with fillable fields and casting.
- Seed scaffolding for future fake/demo content.
- A responsive Blade layout with multilingual language toggle placeholders (Afaan Oromoo / አማርኛ / English).

## Suggested next steps

1. Install a fresh Laravel project (if not already bootstrapped) and copy these files into it.
2. Run migrations:
   ```bash
   php artisan migrate
   ```
3. Add authentication scaffolding (`laravel/breeze` or `laravel/jetstream`) for admin login and RBAC extension.
4. Add WYSIWYG editor (e.g., Trix/TinyMCE) inside admin forms.
5. Add policies and middleware for role-based permissions.
6. Add localization files under `lang/` for Oromo, Amharic, and English.

## Notes

- Because this environment blocks package downloads, full Laravel framework bootstrap could not be installed automatically here.
- The code structure and files are authored to be directly compatible with a standard Laravel app layout.
