<?php

namespace GustavPHP\Starter\Routes;

use GustavPHP\Gustav\Attribute\Route;
use GustavPHP\Gustav\Controller;

class IndexController extends Controller\Base
{
    #[Route('/')]
    public function wizard()
    {
        return $this->redirect('/wizard.html');
    }
}
