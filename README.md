# blog-app [![Build Status](https://travis-ci.org/NtimYeboah/blog-app.svg?branch=master)](https://travis-ci.org/NtimYeboah/blog-app)

Personal blogging app in PHP

## Install

- Clone this repository

`git clone git@github.com:NtimYeboah/blog-app.git`

- Run composer to install packages

`composer install`

- Create env file

`cp .env.example .env`

- Generate key

`php artisan key:generate`

- Set the database connections in the `.env` file

- Run migration

`php artisan migrate`

## Run artisan command

`php artisan register:admin`

## View in browser

`php artisan serve`
