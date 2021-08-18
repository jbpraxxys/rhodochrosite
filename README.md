# Laravel SPA Boilerplate

*Readme to follow*

## Installation instructions

```bash
# Clone the repo
git clone ssh://git@gitlab.praxxys.ph:52222/boilerplates/laravel-spa.git

cd laravel-spa

# Install packages
composer install
npm i

# Setup Laravel
cp .env.example .env
# (then configure DATABASE and MAIL credentials)
php artisan key:generate
php aritsan storage:link
php artisan migrate --seed

# Serve npm (choose one verb)
npm run dev/prod/watch

# Serve
php artisan serve
```