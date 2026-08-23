<?php

namespace App\Routes;

use App\Config\ApplicationConfig;
use App\Contracts\JokeProvider;
use GustavPHP\Gustav\Attribute\Route;
use GustavPHP\Gustav\Controller;

class Welcome extends Controller\Base
{
    public function __construct(
        private readonly JokeProvider $jokes,
        private readonly ApplicationConfig $configuration,
    ) {
    }

    #[Route('/about')]
    public function about(): Controller\Response
    {
        return $this->view('about.latte');
    }

    #[Route('/api')]
    /** @return array{message:string} */
    public function api(): array
    {
        return [
            'message' => "Hello from {$this->configuration->name}!",
        ];
    }

    #[Route('/joke')]
    public function joke(): Controller\Response
    {
        return $this->view('joke.latte', [
            'joke' => $this->jokes->random(),
        ]);
    }

    #[Route('/')]
    public function welcome(): Controller\Response
    {
        return $this->view('index.latte');
    }
}
