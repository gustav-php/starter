<?php

namespace App\Routes;

use App\Contracts\JokeProvider;
use GustavPHP\Gustav\Attribute\{Controller, Csrf, Get, Post};
use GustavPHP\Gustav\Controller\Response;
use GustavPHP\Gustav\Security\CsrfTokenManager;
use GustavPHP\Gustav\{Session, View};

#[Controller]
final readonly class Welcome
{
    public function __construct(
        private readonly JokeProvider $jokes,
        private readonly Session $session,
        private readonly CsrfTokenManager $csrf,
    ) {
    }

    #[Get('/about', name: 'about')]
    public function about(): View
    {
        return new View('about');
    }

    #[Get('/joke', name: 'joke')]
    public function joke(): View
    {
        return new View('joke', [
            'joke' => $this->jokes->random(),
        ]);
    }

    #[Csrf]
    #[Post('/session/reset', name: 'session.reset')]
    public function resetSession(): Response
    {
        $this->session->invalidate();
        $this->session->flash('notice', 'Your session was reset.');

        return new Response(
            status: 303,
            headers: ['Location' => '/session'],
        );
    }

    #[Get('/session', name: 'session')]
    public function session(): View
    {
        $visits = (int) $this->session->get('visits', 0) + 1;
        $this->session->put('visits', $visits);

        return new View('session', [
            'csrfToken' => $this->csrf->token(),
            'notice' => $this->session->getFlash('notice'),
            'visits' => $visits,
        ]);
    }

    #[Get(name: 'home')]
    public function welcome(): View
    {
        return new View('index');
    }
}
