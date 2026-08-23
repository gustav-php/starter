<?php

namespace App\Events;

final readonly class JokeTold
{
    public function __construct(public string $joke)
    {
    }
}
