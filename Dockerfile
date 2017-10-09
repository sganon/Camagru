FROM library/php:7.0-apache
RUN apt-get update
RUN apt-get upgrade -y
RUN docker-php-ext-install pdo pdo_mysql
WORKDIR /var/www/html
COPY config/php.ini /usr/local/etc/php
EXPOSE 80
# CMD ["php", "-S", "0.0.0.0:8080", "index.php"]