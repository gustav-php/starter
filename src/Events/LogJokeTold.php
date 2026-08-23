<?php

namespace App\Events;

use GustavPHP\Gustav\Attribute\Listener;
use Psr\Log\LoggerInterface;

#[Listener]
final readonly class LogJokeTold
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function __invoke(JokeTold $event): void
    {
        $this->logger->info('Joke told', ['characters' => strlen($event->joke)]);
    }
}
