<?php

namespace App\Config;

use GustavPHP\Gustav\Attribute\{Config, Env, Validate};
use GustavPHP\Gustav\Validation\Common\Text;

#[Config]
final readonly class ApplicationConfig
{
    public function __construct(
        #[Env('APP_NAME'), Validate(new Text(minLength: 1, maxLength: 80))]
        public string $name = 'GustavPHP',
    ) {
    }
}
