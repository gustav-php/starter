FROM composer:2.6 as composer

WORKDIR /usr/src/app
COPY composer.json composer.json
COPY composer.lock composer.lock
RUN composer install

FROM php:8.3-cli as final

EXPOSE 4201
ENV MODE=production
WORKDIR /usr/src/app
COPY . .
COPY --from=composer /usr/src/app/vendor vendor
RUN ./vendor/bin/rr get-binary --no-config
ENTRYPOINT ["php", "gustav", "start"]
