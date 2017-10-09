FROM library/php:latest
RUN apt-get update
RUN apt-get upgrade -y
RUN docker-php-ext-install pdo pdo_mysql
WORKDIR /usr/src/camagru
EXPOSE 8080
CMD ["php", "-S", "0.0.0.0:8080", "index.php"]