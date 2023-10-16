<?php

namespace GustavPHP\Starter\Routes;

use GustavPHP\Gustav\Attribute\Route;
use GustavPHP\Gustav\Controller;

class Welcome extends Controller\Base
{
    #[Route('/')]
    public function wizard()
    {
        return $this->view(__DIR__ . '/../../views/index.latte', []);
    }
    #[Route('/about')]
    public function about()
    {
        return $this->view(__DIR__ . '/../../views/about.latte', []);
    }
}
