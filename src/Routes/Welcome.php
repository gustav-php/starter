<?php

namespace App\Routes;

use App\Contracts\JokeProvider;
use GustavPHP\Gustav\Attribute\{Controller, Get};
use GustavPHP\Gustav\View;

#[Controller]
final readonly class Welcome
{
    public function __construct(
        private readonly JokeProvider $jokes,
    ) {
    }

    #[Get('/about', name: 'about')]
    public function about(): View
    {
        return new View('about');
    }

    #[Get('/joke', name: 'joke')]
    public function joke(): View
    {
        return new View('joke', [
            'joke' => $this->jokes->random(),
        ]);
    }

    #[Get(name: 'home')]
    public function welcome(): View
    {
        return new View('index');
    }
}
