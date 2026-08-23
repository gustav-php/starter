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
