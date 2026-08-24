# Gustav starter

The starter is a ready-to-run Gustav application with JSON and HTML endpoints,
typed configuration, dependency injection, commands, events, native views, and
session-backed CSRF protection.

## Installation

Install PHP 8.2 or newer and [Composer](https://getcomposer.org/), then create a
project:

```bash
composer create-project gustav-php/starter example-app 39.0.0-RC1
cd example-app
```

## Usage

Start the development server:

```bash
php gustav dev
```

Open `http://localhost:4201` or try the included command:

```bash
php gustav joke --times=2
php gustav joke --uppercase
```

Useful example routes are:

- `/api` for an inferred JSON response
- `/joke` for an injected service and dispatched event
- `/session` for sessions, flash data, and CSRF protection

Safe development defaults live in `.env`. Put machine-specific overrides in
the ignored `.env.local` file; process environment variables take precedence.

Use deployment environment variables for production credentials. The included
`.dockerignore` prevents a developer's `.env.local` from being copied into an
image.

## Production

Start the production server with:

```bash
php gustav start
```

Review the production environment, session storage, and RoadRunner settings
before deploying. Application logs are newline-delimited JSON and include the
request ID for reported server failures.

Read the full documentation at https://gustav-php.github.io.
