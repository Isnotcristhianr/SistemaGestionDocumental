# Usa una imagen base con PHP y Apache
FROM php:7.4-apache

# Instala extensiones de PHP necesarias para CodeIgniter
RUN docker-php-ext-install mysqli pdo_mysql

# Copia los archivos de tu proyecto al contenedor
COPY . /var/www/html

# Configura el entorno de Apache
RUN a2enmod rewrite
RUN service apache2 restart

#extension intl
RUN apt-get update && apt-get install -y \
    libicu-dev \
    && docker-php-ext-install intl

#cache
RUN apt-get update && apt-get install -y \
    libmemcached-dev \
    zlib1g-dev \
    && pecl install memcached \
    && docker-php-ext-enable memcached