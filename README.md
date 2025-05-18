# Orion Estates, a Laravel App

## Description

A modern Laravel 10 web application using SQLite for the database, Bootstrap for the front-end, and Vite for asset compilation. Includes API authentication with Sanctum, a sync queue system, PHPUnit testing, and is Docker-ready with Laravel Sail.

## Features

- Laravel 10 framework with PHP 8.1+
- SQLite database support
- Frontend with Bootstrap and Vite
- API authentication using Sanctum
- Sync queue system for background tasks
- PHPUnit for testing
- Docker-ready with Laravel Sail

## Requirements

- PHP 8.1+
- Composer
- Node.js and npm
- Docker (optional, for Laravel Sail)

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/pre-abalo/Orion_Estates
   cd Orion_Estates
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Install Node.js dependencies:
   ```bash
   npm install
   ```

4. Copy the `.env` file and configure it:
   ```bash
   cp .env.example .env
   ```

5. Generate the application key:
   ```bash
   php artisan key:generate
   ```

6. Run database migrations:
   ```bash
   php artisan migrate
   ```

7. Serve the application:
   ```bash
   php artisan serve
   ```

   Access the app at [http://127.0.0.1:8000](http://127.0.0.1:8000).

8. Compile frontend assets:
   ```bash
   npm run dev
   ```

## Running Tests

Run PHPUnit tests with: 
```bash
php artisan test
```

## License

This project is licensed under the **MIT License**.
