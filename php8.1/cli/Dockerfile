FROM php:8.1.1-cli

LABEL maintainer="Suyog Khanal"

# Installing required packages
RUN apt-get update && apt-get upgrade -y
RUN DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
  apt-transport-https \
  libicu-dev \
  libonig-dev \
  libzip-dev \
  libcurl4-openssl-dev \
  pkg-config \
  libssl-dev  \
  libmcrypt-dev \
  libxml2-dev \
  libxslt-dev \
  libbz2-dev \
  libfreetype6-dev \
  libjpeg-dev \
  libpng-dev \
  openssl \
  gnupg2 \
  git \
  cron \ 
  vim \
  zip \
  unzip \
  wget \
  screenfetch \
  mariadb-client

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg

# Installing extensions
RUN docker-php-ext-install bcmath \
  ctype \
  curl \
  dom \
  iconv \
  intl \
  mbstring \
  pdo_mysql \
  mysqli \
  simplexml \
  soap \
  xsl \
  zip \
  sockets \
  gd

# Installing other extensions but enabled dynamically
RUN pecl install redis
# RUN docker-php-ext-enable redisz
RUN pecl install xdebug-3.1.6
# RUN docker-php-ext-enable xdebug

# Updating php.ini
ADD conf/php.ini /usr/local/etc/php/php.ini

# Installing composer
VOLUME /root/.composer/cache
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installing n98-magerun2
RUN curl -O https://files.magerun.net/n98-magerun2.phar && chmod +x ./n98-magerun2.phar && mv ./n98-magerun2.phar /usr/local/bin/

# Manage project and add scripts
RUN mkdir /var/www/project
ADD manage-project-permission.sh /root/manage-project-permission.sh
RUN chmod +x /root/manage-project-permission.sh
RUN echo 'alias mpp="/root/manage-project-permission.sh"' >> /root/.bashrc
RUN /root/manage-project-permission.sh

ARG PHP_ENABLE_REDIS
ENV PHP_ENABLE_REDIS ${PHP_ENABLE_REDIS}
ARG PHP_ENABLE_XDEBUG
ENV PHP_ENABLE_XDEBUG ${PHP_ENABLE_XDEBUG}

ADD bin/* /usr/local/bin/
ADD docker-entrypoint.sh /root/docker-entrypoint.sh
RUN chmod +x /root/docker-entrypoint.sh

RUN ["chmod", "+x", "/usr/local/bin/run-cron"]
CMD ["/root/docker-entrypoint.sh", "bash"]
