<?php

namespace App;

require_once __DIR__ . '/../vendor/autoload.php';

use GustavPHP\Gustav\{Application, Configuration};

Application::run(Configuration::forProject(
    namespace: __NAMESPACE__,
    root: dirname(__DIR__),
));
