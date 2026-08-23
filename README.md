# Starter project

## Installation

Before creating your first GustavPHP project, you should ensure that your local machine has [PHP](https://www.php.net/) and [Composer](https://getcomposer.org/) installed.

After you have installed PHP and Composer, you may create a new GustavPHP project via the `create-project` command:

```bash
composer create-project gustav-php/starter --ask
```

## Usage

After the project has been created, start GustavPHP's local development server using the `dev` command:

```bash
php gustav dev
```

The starter marks its in-memory `Jokes` implementation with
`#[Service(as: JokeProvider::class)]` and maps `APP_NAME` into the immutable
`ApplicationConfig` class. Gustav discovers both, so the application entrypoint
contains no service bindings or instance setup.

Safe local defaults live in `.env`. Put machine-specific overrides in the
ignored `.env.local` file; real process environment variables take precedence
over both. Typed configuration classes under `src/Config` can be injected into
controllers and services like any other dependency.

Use deployment environment variables for production credentials. The included
`.dockerignore` prevents a developer's `.env.local` from being copied into an
image.
## Production

Start the production server with:

```bash
php gustav start
```

The included `.rr.prod.yaml` keeps Gustav's newline-delimited JSON application
logs intact on RoadRunner's `server` channel. Gustav reports every `5xx` once
and includes the response's `X-Request-ID` in that record. Inject
`Psr\Log\LoggerInterface` for application logs and
`GustavPHP\Gustav\Http\RequestId` when they need request correlation.
