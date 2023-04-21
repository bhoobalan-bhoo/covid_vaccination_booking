<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
# Covid Vaccination Booking Portal Laravel Backend

## Building

### Pre-requisites:
1. Install laravel using composer: https://laravel.com/docs/8.x/installation#installation-via-composer
2. Install Postgresql v12 server using WSL2 or Docker Desktop
3. It is recommended to setup Postgresql reachable on localhost
4. Install HeidiSQL for DB management: https://www.heidisql.com/download.php 

### Create a local Postgres database for development

```sql
CREATE USER cvb_admin WITH PASSWORD 'cvb_admin';
CREATE DATABASE cvb_db OWNER cvb_admin;
GRANT ALL PRIVILEGES ON DATABASE cvb_db TO cvb_admin;
```

Note: Postgres 12 and below require superuser privilege to install extensions. So connect to `cvb_admin` DB as the `postgres` user and create the following extensions:

```sql
CREATE EXTENSION IF NOT EXISTS citext;
```

### Install application dependencies and DB migration

```sh
git clone https://github.com/bhoobalan-bhoo/covid_vaccination_booking
cd bip-laravel
cp .env.dev .env
# Config .env file for DB Connection and SUPER_ADMIN_EMAIL

composer install
php artisan migrate
php artisan key:generate

# Create an admin user for the Laravel Nova backend
# Create Super Admin user with this email: bhoobalan.cs20@bitsathy.ac.in
php artisan make:filament-user

php artisan db:seed

php artisan serve

# Access CVB at http://localhost:8000/
```
