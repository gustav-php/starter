<?php

namespace App\Routes;

use App\Contracts\JokeProvider;
use GustavPHP\Gustav\Attribute\Route;
use GustavPHP\Gustav\Controller;

class Welcome extends Controller\Base
{
    public function __construct(private readonly JokeProvider $jokes)
    {
    }

    #[Route('/about')]
    public function about(): Controller\Response
    {
        return $this->view('about.latte');
    }

    #[Route('/api')]
    public function api(): Controller\Response
    {
        return $this->plaintext('Hello World!');
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
