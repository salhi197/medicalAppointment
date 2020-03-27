<p align="center"><img src="public/first.png"></p>

[![pipeline status](https://gitlab.com/alex-control/alex-control-web-application/badges/develop/pipeline.svg?style=flat-square)](https://gitlab.com/alex-control/alex-control-web-application/commits/develop)
[![Coverage report](https://gitlab.com/alex-control/alex-control-web-application/badges/develop/coverage.svg?job=coverage)](https://gitlab.com/alex-control/alex-control-web-application/pipelines/latest)

## About Tebibe .. 
This project is about creating a web application for Medical Appintemnt for the algerian community ..

NOTE: 
NEVER WORK ON MASTER BRANCH FOLLOW THE DOCS BELOW  ... 
## Quick Start :
```bash
# clone the repo 
git clone https://github.com/salhi197/medicalAppointment.git

#move to the folder 
cd medicalAppointment

# Install Dependencies
composer install

# swith branch - must do this
git checkout develop

#copy .env.exmple to .env
cp .env.example .env

#open the .env file change the DB_PASSWORD based on yout DB password 
DB_PASSWORD=root

#create a new DB in phpmyadmin called tebibe
go to your phpmyadmin panel and create a db called tebibe

#generer la clé 
php artisan key:generate

# Run Migrations
php artisan migrate

# If you get an error about an encryption_key
php artisan key:generate

# run the server 
php artisan serve

#create a medecin or an admin or a user so you can test the app 
127.0.0.1:8000/register/[admin|user|medecin]
``````


## Supported Languages
* French


## Documentation & Blog
*  The Blog for the Alex-control is located [Here].

## Prerequisites
* Composer: 1.9.1 or higher.
* PHP version >=7.3 
* MARIADB >= 10.3
* APACHE
* MOD_REWRITE
* PHP Extensions cURL & mCrypt should be enabled
* PHP GD Extension
* PHP ZIP Extension
* PHP settings allowurlfopen enabled
* PHP JSON Support
* PHP XML Support
* PHP OpenSSL

## Co-founders
Corona 
Team *_*
## License
Tebibe is not open-sourced .
