# Use the official PHP 8.4 image with Apache
# Note: An official PHP 8.5 image is not yet available [citation:2]
FROM php:8.4-apache

# Change apache root directory
ENV APACHE_DOCUMENT_ROOT=/var/www/html/
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# xdebug
RUN pecl install xdebug \
  && docker-php-ext-enable xdebug
COPY xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Optional: Enable Apache's mod_rewrite for friendly URLs
RUN a2enmod rewrite