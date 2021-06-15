<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Kampus Indonesia

Simple Restfull API with Auth and CRUD Database

## Documentation API

You can check the documentation in [here](https://documenter.getpostman.com/view/7774351/TzeTKAAN#488140cf-886f-45a4-b49b-a706a2e9968a) with Postman

## Getting Started

```bash
# Clone Respository
git clone https://github.com/paul-lestyo/Kampus-Indonesia.git

# Go to directory
cd Kampus-Indonesia

# Install laravel
composer install

# Copy .env
cp .env.example .env

# Then create database and edit database in .env
# add Mail enviroment to send email when reset password
# Then fill GOOGLE_CLIENT_ID GOOGLE_CLIENT_SECRET GOOGLE_REDIRECT_URI with credentians google in .env

# Generate Key
php artisan key:generate

# Migrate and seed database
php artisan migrate --seed

# Run Laravel 
php artisan serve
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
