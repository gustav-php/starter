<?php

namespace GustavPHP\Starter;

require_once __DIR__ . '/../vendor/autoload.php';

use GustavPHP\Gustav\Application;
use GustavPHP\Gustav\Configuration;
use GustavPHP\Gustav\Mode;

$configuration = new Configuration(
    mode: Mode::Development,
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
