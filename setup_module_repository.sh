#!/bin/bash

# Set project name and database credentials
PROJECT_NAME="Module_Repository_Assignment"
DB_CONNECTION="mysql"
DB_HOST="127.0.0.1"
DB_PORT="3306"
DB_DATABASE="module_repository"
DB_USERNAME="arbaz"
DB_PASSWORD="arbaz"

# Create a new Laravel project
composer create-project --prefer-dist laravel/laravel $PROJECT_NAME

# Change to the project directory
cd $PROJECT_NAME

# Install Breeze
composer require laravel/breeze --dev

# Initialize Breeze
php artisan breeze:install

# Configure the database connection in the .env file
sed -i "s/DB_CONNECTION=mysql/DB_CONNECTION=$DB_CONNECTION/" .env
sed -i "s/DB_HOST=127.0.0.1/DB_HOST=$DB_HOST/" .env
sed -i "s/DB_PORT=3306/DB_PORT=$DB_PORT/" .env
sed -i "s/DB_DATABASE=laravel/DB_DATABASE=$DB_DATABASE/" .env
sed -i "s/DB_USERNAME=root/DB_USERNAME=$DB_USERNAME/" .env
sed -i "s/DB_PASSWORD=/DB_PASSWORD=$DB_PASSWORD/" .env

# Migrate the database
php artisan migrate

# Create Module model and migration
php artisan make:model Module -m

# Create ModuleController with CRUD methods
php artisan make:controller ModuleController --resource

# Create CheckRole middleware
php artisan make:middleware CheckRole

# Create Blade views for CRUD operations
mkdir -p resources/views/modules
touch resources/views/modules/index.blade.php
touch resources/views/modules/create.blade.php
touch resources/views/modules/show.blade.php
touch resources/views/modules/edit.blade.php

echo "Now, you'll need to manually edit the following files to implement your assignment:"
echo "  - database/migrations/*_create_modules_table.php"
echo "  - app/Models/Module.php"
echo "  - app/Http/Controllers/ModuleController.php"
echo "  - app/Http/Middleware/CheckRole.php"
echo "  - app/Models/User.php"
echo "  - routes/web.php"
echo "  - resources/views/modules/index.blade.php"
echo "  - resources/views/modules/create.blade.php"
echo "  - resources/views/modules/show.blade.php"
echo "  - resources/views/modules/edit.blade.php"
echo "  - app/Http/Kernel.php"
echo ""
echo "Once you've finished implementing the assignment, run 'php artisan serve' to start the development server."
