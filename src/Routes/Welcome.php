<?php

namespace App\Routes;

use App\Middlewares\Logger;
use App\Services\Jokes;
use DI\Attribute\Inject;
use GustavPHP\Gustav\Attribute\{
    Middleware,
    Route
};
use GustavPHP\Gustav\Controller;

#[Middleware(new Logger())]
class Welcome extends Controller\Base
{
    #[Inject]
    protected Jokes $jokes;

    #[Route('/about')]
    public function about()
    {
        return $this->view(__DIR__ . '/../../views/about.latte');
    }

    #[Route('/api')]
    public function api()
    {
        return $this->plaintext("Hello World!");
    }

    #[Route('/joke')]
    public function joke()
    {
        $joke = $this->jokes->jokes[array_rand($this->jokes->jokes)];

        return $this->view(__DIR__ . '/../../views/joke.latte', [
            'joke' => $joke
        ]);
    }

    #[Route('/')]
    public function welcome()
    {
        return $this->view(__DIR__ . '/../../views/index.latte');
    }
}
