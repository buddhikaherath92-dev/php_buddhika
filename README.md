
## Setup Requirements

- PHP version 8.1 or above
- PHP composer or Docker
- Mysql server (if setting up using composer)

## Setup Instructions

- With docker simply run './vendor/bin/sail up' in project root
- Using composer:
    - run 'composer install' in project root
    - copy '.env.example' file and place it renamed as '.env' in project root
    - fill in database configurations in .env
    - run 'php artisan migrate:fresh --seed'
    - run 'php artisan serve'
    - open 'http://127.0.0.1:8000/' in browser

## Used Framework Features

- Laravel Elaquant ORM
- Laravel Migrations
- Laravel Seeders
- Laravel Requests
- Laravel Factories with faker
- Laravel blade templates with layouts and components
- Laravel testing with PHPUnit


