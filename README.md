# Video Editor Portfolio — Laravel 12

Responsive English-language portfolio and content-management dashboard for Mohamed Ahmed Abu El-Hagag.

## Features
- Responsive public portfolio page
- Admin login using Laravel session authentication and CSRF protection
- Signup with validation and password confirmation
- Admin-only dashboard and project management (public signups do not receive admin privileges)
- Unauthenticated visitors are redirected to the admin login page when opening protected admin URLs
- Custom 403, 404, and 500 error pages
- Protected dashboard with project totals, published items, and drafts
- Full project CRUD: create, edit, publish, and delete
- Login and signup rate limits
- Demo project cards are explicitly described as placeholders, not real client work

## Requirements
- PHP 8.2+
- Composer
- A configured Laravel-supported database

## Setup
1. Install dependencies:
   ```bash
   composer install
   ```
2. Create your environment file and app key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
3. Configure database credentials in `.env`.
4. Add an admin login to `.env` (choose your own strong password; do not commit secrets):
   ```dotenv
   ADMIN_EMAIL=admin@example.com
   ADMIN_PASSWORD=replace-with-a-unique-password-of-at-least-12-characters
   ```
5. Run migrations and seed initial demo cards plus the admin user:
   ```bash
   php artisan migrate --seed
   ```
6. Start the development server:
   ```bash
   php artisan serve
   ```

## URLs
- `/` — public portfolio
- `/admin/login` — sign in
- `/admin/signup` — create a regular account
- `/admin` — admin dashboard (admin login required)
- `/admin/projects` — manage projects (admin login required)

**Security note:** Public signup creates a regular account only. It does not grant admin access. The configured account created by `AdminUserSeeder` receives admin privileges. Existing installations must run `php artisan migrate --seed` after pulling these changes so the `is_admin` column is added and the configured admin account is marked as an administrator. This command preserves existing rows; do not use `migrate:fresh` unless you intend to delete all tables and data.

## Replace demo content
The initial projects are illustrative demo placeholders. Replace their descriptions, video URLs, thumbnails, and visual treatments with approved work before presenting them as completed client projects.

## Contact data
The public email and phone are sourced from the supplied CV. No extra social accounts or employment history have been invented.

## Main structure
- `routes/web.php` — public and protected admin routes
- `bootstrap/app.php` — guest redirect and middleware alias configuration
- `app/Http/Controllers/PortfolioController.php` — public page data
- `app/Http/Controllers/Admin` — authentication, dashboard, and project management
- `app/Http/Middleware/EnsureUserIsAdmin.php` — admin-only access
- `database/migrations` — database schema
- `database/seeders` — admin account and clearly labelled demo cards
- `resources/views/admin` — dashboard, login, signup, and project forms
- `resources/views/errors` — custom error pages
- `public/css` — public and admin styling

> The code has been committed to GitHub but has not been run through a local Laravel installation or automated test suite. Verify it locally before production deployment.
