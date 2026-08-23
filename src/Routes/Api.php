<?php

namespace App\Routes;

use App\Config\ApplicationConfig;
use GustavPHP\Gustav\Attribute\{Controller, Get};

#[Controller('/api')]
final readonly class Api
{
    public function __construct(private ApplicationConfig $configuration)
    {
    }

    /** @return array{message:string} */
    #[Get]
    public function index(): array
    {
        return [
            'message' => "Hello from {$this->configuration->name}!",
        ];
    }
}
