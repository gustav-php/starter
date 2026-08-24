<?php

declare(strict_types=1);

use GustavPHP\Gustav\Application;
use Nyholm\Psr7\ServerRequest;

require dirname(__DIR__) . '/vendor/autoload.php';

$application = new Application(require dirname(__DIR__) . '/app/bootstrap.php');
$response = $application->handle(new ServerRequest('GET', '/api'));
$payload = json_decode((string) $response->getBody(), true, flags: JSON_THROW_ON_ERROR);

if ($response->getStatusCode() !== 200) {
    throw new RuntimeException("Expected status 200, received {$response->getStatusCode()}");
}

if ($payload !== ['message' => 'Hello from GustavPHP!']) {
    throw new RuntimeException('The starter API returned an unexpected response');
}

echo "Starter smoke test passed\n";
