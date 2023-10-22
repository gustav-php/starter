FROM composer:2.6 as composer

WORKDIR /usr/src/app
COPY composer.json composer.json
COPY composer.lock composer.lock
RUN composer install

FROM php:8.1-cli as final

ENV MODE=production
WORKDIR /usr/src/app
COPY . .
COPY --from=composer /usr/src/app/vendor vendor
ENTRYPOINT ["php", "gustav", "serve"]