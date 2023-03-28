#!/bin/bash

# Update package lists and install required packages for PHP and MySQL
sudo apt update
sudo apt install -y php php-cli php-common php-curl php-json php-mbstring php-xml php-zip php-mysql mysql-server

# Download and install Composer
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
php -r "unlink('composer-setup.php');"

# Set up global Laravel Installer
composer global require laravel/installer

# Update PATH to include the Composer global vendor binaries directory
echo 'export PATH="$HOME/.config/composer/vendor/bin:$PATH"' >> ~/.bashrc
source ~/.bashrc

# Secure MySQL installation
echo "You will be prompted to set up a root password and some basic configurations for MySQL."
sudo mysql_secure_installation

echo "Installation of PHP, Composer, Laravel Installer, and MySQL server is complete."
