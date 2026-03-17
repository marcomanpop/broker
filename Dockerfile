FROM php:8.1-apache

# Enable Apache modules
RUN a2enmod rewrite

# Install system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    mariadb-client \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Set Apache DocumentRoot to /var/www/html
ENV APACHE_DOCUMENT_ROOT=/var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy application code
COPY . /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html

# Enable error logging
RUN echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-errors.ini && \
    echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-errors.ini

WORKDIR /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
