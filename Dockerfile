FROM composer:2.6 as composer

WORKDIR /usr/src/app
COPY composer.json composer.json
COPY composer.lock composer.lock
RUN composer install --ignore-platform-reqs --no-dev --optimize-autoloader

FROM php:8.2-cli-alpine as final


EXPOSE 5173
ENV MODE=production
WORKDIR /usr/src/app
COPY . .
COPY --from=composer /usr/src/app/vendor vendor
RUN ./vendor/bin/rr get-binary --no-config
ENTRYPOINT ["php", "gustav", "start"]
