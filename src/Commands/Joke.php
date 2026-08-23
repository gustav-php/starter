<?php

namespace App\Commands;

use App\Contracts\JokeProvider;
use GustavPHP\Gustav\Attribute\{Command, Option, Validate};
use GustavPHP\Gustav\Validation\Common\Integer;
use Symfony\Component\Console\Output\OutputInterface;

#[Command('joke', description: 'Tell one or more jokes')]
final readonly class Joke
{
    public function __construct(
        private JokeProvider $jokes,
        private OutputInterface $output,
    ) {
    }

    public function __invoke(
        #[Option(shortcut: 't', description: 'Number of jokes')]
        #[Validate(new Integer(min: 1, max: 5))]
        int $times = 1,
        #[Option(description: 'Use uppercase output')]
        bool $uppercase = false,
    ): void {
        for ($current = 0; $current < $times; $current++) {
            $joke = $this->jokes->random();
            $this->output->writeln($uppercase ? strtoupper($joke) : $joke);
        }
    }
}
