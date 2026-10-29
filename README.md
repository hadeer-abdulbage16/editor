# Video Editor Portfolio — Laravel 12

Responsive English-language portfolio and content-management dashboard for Mohamed Ahmed Abu El-Hagag.

## Features
- Responsive public portfolio page
- Admin login using Laravel session authentication and CSRF protection
- Protected dashboard with project totals, published items, and drafts
- Full project CRUD: create, view list, edit, delete
- Publish/unpublish projects to control what appears publicly
- Project descriptions, categories, video URL, thumbnail URL, duration, visual style, and ordering
- Login rate limit and password stored through Laravel's hash system
- Demo project cards are explicitly described as placeholders, not real client work

## Requirements
- PHP 8.2+
- Composer
- A configured Laravel-supported database

## Setup
1. Install dependencies:
   \`\`\`bash
   composer install
   \`\`\`
2. Create your environment file and app key:
   \`\`\`bash
   cp .env.example .env
   php artisan key:generate
   \`\`\`
3. Configure database credentials in \`.env\`.
4. Add an admin login to \`.env\` (choose your own strong password; do not commit secrets):
   \`\`\`dotenv
   ADMIN_EMAIL=admin@example.com
   ADMIN_PASSWORD=replace-with-a-unique-password-of-at-least-12-characters
   \`\`\`
5. Run migrations and seed initial demo cards plus the admin user:
   \`\`\`bash
   php artisan migrate --seed
   \`\`\`
6. Start the development server:
   \`\`\`bash
   php artisan serve
   \`\`\`

Visit \`/admin/login\` and sign in using the email and password set in your local \`.env\`.

## Admin routes
- \`/admin/login\` — sign in
- \`/admin\` — dashboard (login required)
- \`/admin/projects\` — manage projects (login required)

## Replace demo content
The initial projects are illustrative demo placeholders. Replace their descriptions, video URLs, thumbnails, and visual treatments with approved work before presenting them as completed client projects. You can manage project text and URLs from the dashboard.

## Contact data
The public email and phone are sourced from the supplied CV. No extra social accounts or employment history have been invented.

## Main structure
- \`routes/web.php\` — public and protected admin routes
- \`app/Http/Controllers/PortfolioController.php\` — public page data
- \`app/Http/Controllers/Admin\` — authentication, dashboard, and project management
- \`app/Models/PortfolioProject.php\` — project model
- \`database/migrations\` — portfolio projects table
- \`database/seeders\` — admin account and clearly labelled demo cards
- \`resources/views/portfolio\` — public website
- \`resources/views/admin\` — dashboard, login, and project forms
- \`public/css\` — public and admin styling
- \`public/js/portfolio.js\` — public demo modal

> The code has been committed to GitHub and checked for file presence, but it has not yet been run through a local Laravel installation or automated test suite. Verify it locally before production deployment.
