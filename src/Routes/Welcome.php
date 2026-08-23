<?php

namespace App\Routes;

use App\Contracts\JokeProvider;
use GustavPHP\Gustav\Attribute\{Controller, Get};
use GustavPHP\Gustav\Controller\{Base, Response};

#[Controller]
final class Welcome extends Base
{
    public function __construct(
        private readonly JokeProvider $jokes,
    ) {
    }

    #[Get('/about', name: 'about')]
    public function about(): Response
    {
        return $this->view('about.latte');
    }

    #[Get('/joke', name: 'joke')]
    public function joke(): Response
    {
        return $this->view('joke.latte', [
            'joke' => $this->jokes->random(),
        ]);
    }

    #[Get(name: 'home')]
    public function welcome(): Response
    {
        return $this->view('index.latte');
    }
}
