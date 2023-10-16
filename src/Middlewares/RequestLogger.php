<?php

namespace GustavPHP\Starter\Middlewares;

use GustavPHP\Gustav\Logger\Logger;
use GustavPHP\Gustav\Message\RequestInterface;
use GustavPHP\Gustav\Message\ResponseInterface;
use GustavPHP\Gustav\Middleware\Base;

class RequestLogger extends Base
{
    public function __construct()
    {
    }

    public function handle(RequestInterface $request, ResponseInterface $response): void
    {
        Logger::log("[{$request->getMethod()}] {$request->getUrl()}");
    }
}
