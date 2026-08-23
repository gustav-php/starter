<?php

namespace App;

require_once __DIR__ . '/../vendor/autoload.php';

use GustavPHP\Gustav\Application;

Application::run(require __DIR__ . '/bootstrap.php');
