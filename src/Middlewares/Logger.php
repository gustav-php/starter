<?php

namespace App\Middlewares;

use GustavPHP\Gustav\Middleware\Base;
use Psr\Http\Message\ServerRequestInterface;

class Logger extends Base
{
    public function handle(ServerRequestInterface $request): ServerRequestInterface
    {
        $this->log("[{$request->getMethod()}] {$request->getUri()->getPath()}");

        return $request;
    }
}
