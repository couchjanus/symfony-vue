FROM php:8.0-fpm

RUN apt-get update \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y zlib1g-dev g++ git libicu-dev zip libzip-dev libssl-dev libxml2-dev libpq-dev \
    && docker-php-ext-install -j$(nproc) intl opcache \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN curl https://deb.nodesource.com/setup_16.x | bash
RUN curl https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list

RUN apt-get update && apt-get install -y nodejs yarn


WORKDIR /var/www

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quiet

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

RUN git config --global user.email "couchjanus@gmail.com" && \ 
    git config --global user.name "couchjanus"

RUN useradd -rm -d /home/www -s /bin/bash -g root -G sudo -u 1000 www
USER www

EXPOSE 9000
