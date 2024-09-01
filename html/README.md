# Laravel 10 Custom Registration and Login

This repository provides an example of a custom registration and login system implemented in Laravel 10.

## Getting Started

### 1. Create a new project

```
composer create-project laravel/laravel custom-login
```

### 2. Set up your database credentials

Update the .env file in your project root with your database details:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 3. Install Yoeunes toastr package

```
composer require yoeunes/toastr
```

### 4. Migrate your database tables

```
php artisan migrate
```