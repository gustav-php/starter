<?php

namespace GustavPHP\Starter\Middlewares;

use GustavPHP\Gustav\Logger\Logger;
use GustavPHP\Gustav\Middleware\Base;
use Psr\Http\Message\ServerRequestInterface;

class RequestLogger extends Base
{
    public function __construct()
    {
    }

    public function handle(ServerRequestInterface $request): ServerRequestInterface
    {
        Logger::log("[{$request->getMethod()}] {$request->getUri()}");

        return $request;
    }
}
