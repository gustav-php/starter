<?php

namespace App;

require_once __DIR__ . '/../vendor/autoload.php';

use GustavPHP\Gustav\Application;
use GustavPHP\Gustav\Configuration;
use GustavPHP\Gustav\Mode;

$mode = \getenv('MODE') === 'production'
    ? Mode::Production
    : Mode::Development;

$configuration = new Configuration(
    mode: $mode,
    namespace: __NAMESPACE__,
    cache: __DIR__ . '/../cache/',
    files: __DIR__ . '/../public/',
);

$app = new Application(configuration: $configuration);

$app->start();
