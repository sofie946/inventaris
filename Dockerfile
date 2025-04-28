# Gunakan image PHP dengan Nginx
FROM php:8.2-fpm-alpine

# Install dependensi dan PHP extension yang diperlukan
RUN apk add --no-cache \
    nginx \
    bash \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    zlib-dev \
    libxpm-dev \
    && docker-php-ext-configure gd --with-jpeg --with-webp --with-xpm \
    && docker-php-ext-install gd pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory ke /var/www
WORKDIR /var/www

# Salin semua file dari project ke dalam container
COPY . .

# Expose port 80 untuk akses HTTP
EXPOSE 80

# Jalankan Nginx dan PHP-FPM
CMD ["sh", "-c", "nginx -g 'daemon off;' & php-fpm"]
