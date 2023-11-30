# Usa la imagen oficial de PHP con Apache para la arquitectura ARM64
FROM php:8.0-apache

# Establece el directorio de trabajo en el contenedor
WORKDIR /var/www/html

# Copia todos los archivos de tu proyecto al contenedor
COPY . /var/www/html

# Expone el puerto 80 para el servidor web Apache
EXPOSE 80

# crea la ruta para el directorio como: http://localhost/SistemaGestionDocumental/ ya no http://localhost:8080/
RUN sed -i 's/80/8080/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf


#extensión extension intl
RUN apt-get update && \
    apt-get install -y libicu-dev && \
    docker-php-ext-install intl

#extensión de php para mysql
RUN docker-php-ext-install mysqli

#extensión de php para pdo
RUN docker-php-ext-install pdo pdo_mysql

#extensión de php para gd
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev 

#permisis del directorio
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 writable/cache
RUN chown -R www-data:www-data writable/cache

#habilitar cors 
RUN a2enmod headers




