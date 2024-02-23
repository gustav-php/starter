<?php

namespace App;

require_once __DIR__ . '/../vendor/autoload.php';

use GustavPHP\Gustav\{Application, Configuration, Mode};

$mode = \getenv('MODE') === 'production'
    ? Mode::Production
    : Mode::Development;

$configuration = new Configuration(
    mode: $mode,
    namespace: __NAMESPACE__,
    cache: __DIR__ . '/../cache/',
    files: __DIR__ . '/../public/',
    views: __DIR__ . '/../views/'
);

$app = new Application(configuration: $configuration);

$app->start();
