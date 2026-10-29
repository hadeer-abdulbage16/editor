# Video Editor Portfolio — Laravel 12

A responsive, English-language portfolio for **Mohamed Ahmed Abu El-Hagag**, built with Laravel 12, Blade, CSS, and vanilla JavaScript.

## Features
- Responsive editorial-style landing page
- Selected-work cards with clearly labelled demo placeholders
- Editing approach, skills, and editing tools sections
- Contact links using the phone number and email supplied in the CV
- Accessible demo-detail modal with keyboard dismissal
- MVC structure: route → controller → Blade view

## Requirements
- PHP 8.2+
- Composer

## Run locally
\`\`\`bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
\`\`\`

Open the local URL printed by Artisan.

## Replace demo placeholders
The project cards in \`app/Http/Controllers/PortfolioController.php\` are sample concepts, not claims of completed client work. Replace the project data and visual treatments with approved work when available. Update \`resources/views/portfolio/index.blade.php\` to add real video embeds or poster images, and ensure you have permission to publish the footage.

## Contact data
The contact email and phone number are sourced from the supplied CV. No additional social accounts or employment history have been invented.

## Structure
- \`routes/web.php\` — homepage route
- \`app/Http/Controllers/PortfolioController.php\` — portfolio content
- \`resources/views/portfolio/index.blade.php\` — page markup
- \`public/css/portfolio.css\` — responsive styling
- \`public/js/portfolio.js\` — demo modal behavior

> Note: The standard Laravel 12 application skeleton remains in this repository. Portfolio code has been committed on top of it; dependencies and the app have not been run in this environment.
