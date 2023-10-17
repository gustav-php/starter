<?php

namespace GustavPHP\Starter\Routes;

use DI\Attribute\Inject;
use GustavPHP\Gustav\Attribute\{
    Middleware,
    Route
};
use GustavPHP\Gustav\Controller;
use GustavPHP\Starter\Middlewares\Logger;
use GustavPHP\Starter\Services\Jokes;

#[Middleware(Logger::class)]
class Welcome extends Controller\Base
{
    #[Inject]
    protected Jokes $jokes;

    #[Route('/')]
    public function welcome()
    {
        return $this->view(__DIR__ . '/../../views/index.latte');
    }

    #[Route('/about')]
    public function about()
    {
        return $this->view(__DIR__ . '/../../views/about.latte');
    }

    #[Route('/joke')]
    public function joke()
    {
        $joke = $this->jokes->jokes[array_rand($this->jokes->jokes)];

        return $this->view(__DIR__ . '/../../views/joke.latte', [
            'joke' => $joke
        ]);
    }
}
