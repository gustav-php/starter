<?php

namespace GustavPHP\Starter\Routes;

use GustavPHP\Gustav\Attribute\{
    Middleware,
    Route
};
use GustavPHP\Gustav\Controller;
use GustavPHP\Starter\Middlewares\RequestLogger;

#[Middleware(RequestLogger::class)]
class Welcome extends Controller\Base
{
    #[Route('/')]
    public function welcome()
    {
        return $this->view(__DIR__ . '/../../views/index.latte', []);
    }
    #[Route('/about')]
    public function about()
    {
        return $this->view(__DIR__ . '/../../views/about.latte', []);
    }
}
