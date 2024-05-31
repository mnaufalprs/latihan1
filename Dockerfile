# FROM node:18.15-alpine as nodebuilder

# WORKDIR /app

# COPY package*.json ./

# RUN npm install

# COPY . .

# FROM php:8.3.1-fpm

# RUN apt-get update && apt-get install -y \
#     git \
#     curl \
#     zip \
#     unzip

# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# WORKDIR /var/www/html

# COPY composer.json composer.lock ./
# RUN composer install --no-dev --optimize-autoloader

# COPY . .

# COPY --from=nodebuilder /app/public /var/www/html/public

# RUN chown -R www-data:www-data /var/www/html

# EXPOSE 8080
# CMD ["php-fpm"], [ "npm", "run", "dev"], [ "npm", "run", "start"]

# FROM node:18.15-alpine as nodebuilder

# WORKDIR /app

# COPY package*.json ./

# RUN npm install

# FROM php:8.3.1-fpm

# RUN apt-get update && apt-get install -y \
#     git \
#     curl \
#     zip \
#     unzip

# WORKDIR /app

# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# COPY composer.json .
# RUN composer install --no-scripts

# RUN echo '#!/bin/sh\nnpm run dev &\nnpm run start &\nwait' > /start.sh && chmod +x /start.sh

# CMD ["/start.sh"]

# # Stage 1: Node.js Builder
# FROM node:18.15-alpine as nodebuilder

# WORKDIR /app

# COPY package*.json ./

# RUN npm install

# # Stage 2: PHP Builder
# FROM php:8.3.1-fpm

# RUN apt-get update && apt-get install -y \
#     git \
#     curl \
#     zip \
#     unzip

# WORKDIR /app

# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# COPY composer.json .
# RUN composer install --no-scripts

# # Copy application files
# COPY . .

# # Combine Node.js and PHP
# WORKDIR /app

# # Copy Node.js dependencies from Node.js builder stage
# COPY --from=nodebuilder /app/node_modules ./node_modules

# # Ensure both applications start correctly
# RUN echo '#!/bin/sh\nnpm run dev &\nphp-fpm -D\nwait' > /start.sh && chmod +x /start.sh

# # Set environment variable for PORT
# ENV PORT 8080

# # Expose port
# EXPOSE 8080

# # Define command to start the container
# CMD ["/start.sh"]



# # yang ini udh berhasil tinggal connect database
# FROM php:8.3.1-fpm-alpine

# # Install necessary packages using apk
# RUN apk update && apk add --no-cache \
#     git \
#     curl \
#     libpng-dev \
#     libxml2-dev \
#     zip \
#     unzip

# # Install Composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# # Set working directory
# WORKDIR /app

# # Copy composer files and install dependencies
# COPY composer.json .
# RUN composer install --no-scripts
# # RUN npm run build
# # Copy application files
# COPY . .

# # Command to run the application
# CMD php artisan serve --host=0.0.0.0 --port 80


# Gunakan basis image PHP dengan CLI dan Alpine
FROM php:8.3.1-cli-alpine

RUN apk update && apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    oniguruma-dev \
    bash \
    icu-dev \
    libzip-dev \
    freetype-dev \
    openssl \
    nodejs \
    npm \
    mariadb-connector-c-dev

RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd intl

# # Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

COPY composer.json .
RUN composer install --no-scripts

# Copy seluruh file aplikasi
COPY . .

# # Setelah menyalin semua file, jalankan composer lagi untuk autoloader
# RUN composer dump-autoload --optimize
# Install npm dependencies and build assets
RUN npm install
# RUN node server.js
# RUN php artisan migrate
# RUN npm install socket.io@latest
RUN npm install socket.io-client@latest

# Expose port 80 untuk aplikasi
EXPOSE 80
EXPOSE 3000

# Command untuk menjalankan aplikasi
# CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=80 
CMD php artisan serve --host=0.0.0.0 --port=80
# CMD node server.js
