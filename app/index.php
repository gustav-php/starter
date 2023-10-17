<?php

namespace GustavPHP\Starter;

require_once __DIR__ . '/../vendor/autoload.php';

use GustavPHP\Gustav\Application;
use GustavPHP\Gustav\Configuration;
use GustavPHP\Gustav\Mode;

$mode = $_ENV['MODE'] === 'production' ? Mode::Production : Mode::Development;

$configuration = new Configuration(
    mode: $mode,
    cache: __DIR__ . '/../cache/',
    files: __DIR__ . '/../public/',
    eventNamespaces: [
        'GustavPHP\Starter\Events'
    ],
    routeNamespaces: [
        'GustavPHP\Starter\Routes'
    ],
    serviceNamespaces: [
        'GustavPHP\Starter\Services'
    ]
);

$app = new Application(configuration: $configuration);

$app->start();
