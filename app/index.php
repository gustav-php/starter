<?php

namespace GustavPHP\Starter;

require_once __DIR__ . '/../vendor/autoload.php';

use GustavPHP\Gustav\Application;
use GustavPHP\Gustav\Configuration;
use GustavPHP\Gustav\Mode;

$mode = \getenv('MODE') === 'production'
    ? Mode::Production
    : Mode::Development;

$configuration = new Configuration(
    mode: $mode,
    cache: __DIR__ . '/../cache/',
    files: __DIR__ . '/../public/',
    eventNamespaces: [
        __NAMESPACE__ . '\Events'
    ],
    routeNamespaces: [
        __NAMESPACE__ . '\Routes'
    ],
    serviceNamespaces: [
        __NAMESPACE__ . '\Services'
    ],
    serializerNamespaces: [
        __NAMESPACE__ . '\Serializers'
    ],
);

$app = new Application(configuration: $configuration);

$app->start();
