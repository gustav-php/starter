<?php

namespace GustavPHP\Starter;

require_once __DIR__ . '/../vendor/autoload.php';

use GustavPHP\Gustav\Application;
use GustavPHP\Gustav\Configuration;

$configuration = new Configuration(
    files: __DIR__ . '/../public/',
    eventNamespaces: [
        'GustavPHP\Starter\Events'
    ],
    routeNamespaces: [
        'GustavPHP\Starter\Routes'
    ],
);

$app = new Application(configuration: $configuration);

$app->start();
