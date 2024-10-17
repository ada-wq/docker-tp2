FROM php:fpm

# Installer les extensions PDO et PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /app
COPY src /app
