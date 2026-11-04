# Video Editor Portfolio — Laravel 12

Responsive English-language portfolio and admin dashboard for Mohamed Ahmed Abu El-Hagag.

## Features
- Responsive public portfolio
- Admin authentication and protected dashboard
- Project CRUD with title, category, description, duration, video URL, uploaded thumbnail, publish status, and sort order
- YouTube, Google Drive, Vimeo, and direct video links on the public portfolio
- Uploaded project thumbnails saved under `public/uploads/projects`; their relative paths are stored in the database
- Custom 403, 404, and 500 error pages

## Requirements
- PHP 8.2+
- Composer
- XAMPP (Apache + MySQL) or another local PHP/MySQL environment

## Run locally on Windows / XAMPP

The project folder used for local development is:

```text
C:\xampp\htdocs\editor
```

### 1. Start services and create the database
1. Open XAMPP Control Panel.
2. Start **Apache** and **MySQL**.
3. Open `http://localhost/phpmyadmin`.
4. Create a database named **editor** using `utf8mb4_unicode_ci` collation.

### 2. Configure Laravel
Open a terminal in `C:\xampp\htdocs\editor` and run:

```bash
composer install
```

Copy `.env.example` to `.env` (on Windows CMD: `copy .env.example .env`). The local MySQL settings should be:

```dotenv
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=editor
DB_USERNAME=root
DB_PASSWORD=
```

If your MySQL root account has a password, enter it as `DB_PASSWORD`.

Set a private admin account in `.env`. Choose your own password; do not commit the `.env` file:

```dotenv
ADMIN_EMAIL=your-admin-email@example.com
ADMIN_PASSWORD=your-strong-password-at-least-12-characters
```

Generate the application key:

```bash
php artisan key:generate
```

### 3. Create/update tables and seed the admin
Run:

```bash
php artisan migrate --seed
```

This runs all outstanding migrations and seeds the configured admin account plus the initial demo projects. It does **not** delete existing data. Do not use `migrate:fresh` on a database containing projects you want to keep.

### 4. Run the website
For the simplest local setup, run:

```bash
php artisan serve
```

Open:

- Public portfolio: `http://127.0.0.1:8000`
- Admin login: `http://127.0.0.1:8000/admin/login`
- Admin dashboard: `http://127.0.0.1:8000/admin`

### 5. Uploaded thumbnails
The application stores uploaded image files in `public/uploads/projects` and stores their relative paths in `portfolio_projects.thumbnail_path`. Ensure this directory is writable by PHP. Accepted formats: JPG, JPEG, PNG, WEBP; maximum 3 MB.

## Production deployment
Use production environment values, set `APP_DEBUG=false`, configure the production database and a strong private admin password, and ensure the uploads directory is writable. Never upload the local `.env` file or commit secrets.

## Security
Public signup creates a regular user only. The configured account created by `AdminUserSeeder` receives admin privileges. Never expose the admin password in source control.
