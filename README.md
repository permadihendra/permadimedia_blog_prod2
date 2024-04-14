# Starter Template Bootstrap 5.3 - Laravel 11

## About this starter template

This starter template built with preconfigure Bootstrap css, SB Admin Template, and basic Blog Template.
I was built this template for helping with faster development setup and can jump right to the backend logic.

## This starter template is built with

1. [Laravel v11.3](https://laravel.com/docs/11.x)
2. [Bootstrap v5.3.3](https://getbootstrap.com)
3. [Startbootstrap - Blog Template](https://github.com/startbootstrap/startbootstrap-blog-home)
4. [Startbootstrap - SB Admin](https://github.com/startbootstrap/startbootstrap-sb-admin)

## How to use this template

### 1. Clone this repository
clone with ssh 
```
git clone git@github.com:permadihendra/starter-template-bootstrap-laravel.git new-directory-name
```
or Clone with https
```
git clone https://github.com/permadihendra/starter-template-bootstrap-laravel.git new-directory-name
```


### 2. Run Composer Install
The install command reads the composer.json file from the directory, resolves the dependencies, and installs them into lravel's vendor folder
```
composer install
```

### 3. Make a copy of .env file for development
```
cp .env.example .env
```

### 4. Generate APP Key for encryption
```
php artisan key:generate
```

### 5. Prepare Database, Migrate and seed
Create database sqlite for development
```
touch database/database.sqlite
```
run the migration
```
php artisan migrate:fresh --seed
```

### 6. Rollup PHP Dev Server & Run NPM command
roll up the PHP Development Server
```
php artisan serve
```
install node dependencies and run development mode
```
npm install & npm run dev
```


### Happy Coding !!
