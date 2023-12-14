<?php

namespace App\Routes;

use App\Services\Jokes;
use DI\Attribute\Inject;
use GustavPHP\Gustav\Attribute\{
    Route
};
use GustavPHP\Gustav\Controller;

class Welcome extends Controller\Base
{
    #[Inject]
    protected Jokes $jokes;

    #[Route('/about')]
    public function about()
    {
        return $this->view('about.latte');
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

        return $this->view('joke.latte', [
            'joke' => $joke
        ]);
    }

    #[Route('/')]
    public function welcome()
    {
        return $this->view('index.latte');
    }
}
