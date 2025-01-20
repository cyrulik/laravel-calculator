# Simple calculator in Laravel

To save time I've used Laravel Sail for development environment. I haven't installed any code quality tools in this package, as it's just a wrapper around the actual logic in `cyrulik/simple-calculator` package.

## Installation

```bash
composer install
sail up -d
```

To compile local assets for development, run:
```bash
sail npm run dev
```

For production, run:
```bash
sail npm run build
```

## Usage

Visit the app in your browser at http://localhost.

Alternatively, go to http://localhost/js to use the JavaScript version.

API documentation for the calculator endpoint is available at http://localhost/docs/api.

## Testing

Tests for this application can be run via:
```bash
sail test
```

You can also generate a coverage report:
```bash
XDEBUG_MODE=coverage sail test --coverage-html coverage
```
