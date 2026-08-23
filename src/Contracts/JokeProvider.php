<?php

namespace App\Contracts;

interface JokeProvider
{
    public function random(): string;
}
