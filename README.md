# Afrinet Telecom Coding Challenge
Above is an Admin Panel built with Laravel 8 and Livewire that has below functionalities.
## Features
- Authentication (Login only)
- Add,Edit,Delete a Company
- Add,Edit,Delete an Employee
- Add,View,Delete a Task
- Upload a Logo for Company
- Associate Employee with an existing Company.
- Send Email Notification on Creation of Company.

## Requirements
- php 7.3 and above 
- php "GD library extension" of `intervention/image` package.
  - on windows machine open your php.ini file and uncomment `extension=gd` line.
  - on linux machine follow below instructions
    - sudo add-apt-repository ppa:ondrej/php
    - sudo apt update
    - sudo apt-get install php7.4-gd *note use installed php version*

## Installation
- Clone or download the code
- Run composer install to build up the vendor folder
- Copy `.env.example` to `.env` and edit below variables
  - `DB_HOST`
  - `DB_NAME`
  - `DB_USERNAME`
  - `DB_PASSWORD`
*credentials from mailtrap*
  - `MAIL_USERNAME` 
  - `MAIL_PASSWORD`
  
- Run `php artisan key:generate`
- Run `php artisan serve`
- Open browser and go to http://127.0.0.1:8000
