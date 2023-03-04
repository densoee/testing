FROM php:7.4-apache

RUN docker-php-ext-install mysqli

COPY index.php /var/www/html/

WORKDIR /var/www/html/

CMD ["apache2-foreground"]
