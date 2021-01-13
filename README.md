<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<h3 align="center">
Accident Tracking System
</h3>

## Prerequisites

- Download and install Composer https://getcomposer.org/download/
- Database server (MySQL)

## How to setup this project

Please follow following steps to setup this project in your machine

- Download / Clone this project.
- Open this project folder in CMD
- Type "composer install" and press enter, this will take a while
- Create a databse schema named "pusl"
- Duplicate '.env.example' file and rename it to '.env'
- Check your database settings are correct in '.env' file (DB_PORT,DB_DATABASE,DB_USERNAME,DB_PASSWORD)
- After that run "php artisan key:generate"
- After that run "php artisan migrate"
- Finally run "php artisan serve"
- Click on the generated link to view project

Cheers!!!!


