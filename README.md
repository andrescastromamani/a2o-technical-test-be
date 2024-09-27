<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<!-- GETTING STARTED -->
## Getting Started

Run project in a local environment

### Prerequisites

* Php: 8.3.0
* Composer: 2.6.5
* Extensions: Have php extensions enabled (curl, fileinfo, gd, mbstring, pdo_sqlite, etc.)

### Installation

1. Clone the repo
   * Open your terminal or command prompt.
   * Navigate to your desired project directory.
   * Use the git clone command to clone the repository.
   ```sh
    git clone https://github.com/andrescastromamani/a2o-technical-test-be.git
    ```
2. Install Composer Dependencies
   * Navigate to your project folder.
   * Run composer install to install PHP dependencies.
    ```sh
    composer install
    ```
3. Setup .env
   * Duplicate the .env.example file and rename it to .env.
   * Open the .env file and set your database connection details.
   ```sh
   cp .env.example .env
   ```
   ```sh
   DB_CONNECTION=sqlite
   # DB_HOST=127.0.0.1
   # DB_PORT=3306
   # DB_DATABASE=laravel
   # DB_USERNAME=root
   # DB_PASSWORD=
   ```
4. Generate an application key.
   ```sh
   php artisan key:generate
   ```
5. Migrate the Database
   * Run database migrations to create tables.
   ```sh
   php artisan migrate
   ```
6. Start the Development Server
    ```sh
    php artisan serve
   ```
