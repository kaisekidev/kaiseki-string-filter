# kaiseki/string-filter

Composable string filters with a simple pipeline.

A filter is any object implementing `StringFilterInterface` — `__invoke(string): string`.
`StringFilterPipeline` chains filters and applies them left to right, so transformations compose
cleanly (and pipelines nest, since the pipeline is itself a filter). The package ships a few
ready-made filters for tidying up markup/punctuation artifacts.

## Installation

```bash
composer require kaiseki/string-filter
```

Requires PHP 8.2 or newer.

## Usage

```php
use Kaiseki\StringFilter\RemoveDanglingColon;
use Kaiseki\StringFilter\RemoveDoubleSquareBracketsStringFilter;
use Kaiseki\StringFilter\StringFilterPipeline;

$filter = new StringFilterPipeline(
    new RemoveDoubleSquareBracketsStringFilter(), // "[[Title]]" -> "Title"
    new RemoveDanglingColon(),                    // "Title:"    -> "Title"
);

echo $filter('[[Title]]:'); // "Title"
```

## Included filters

| Filter | Behavior |
| --- | --- |
| `StringFilterPipeline` | Apply several filters in sequence. |
| `PregReplaceStringFilter` | `preg_replace` with matching `pattern`/`replacement` lists (throws if their lengths differ). |
| `RemoveDanglingColon` | Strip a trailing colon: `Title:` → `Title`. |
| `RemoveDoubleSquareBracketsStringFilter` | Unwrap `[[ … ]]`: `[[x]]` → `x`. |
| `RemoveDoubleCurlyBracketsStringFilter` | Unwrap `{{ … }}`. |
| `RemoveDoubleRoundBracketsStringFilter` | Unwrap `(( … ))`. |
| `RemoveDoubleAngleBracketsStringFilter` | Unwrap `<< … >>`. |

Write your own by implementing `StringFilterInterface`:

```php
use Kaiseki\StringFilter\StringFilterInterface;

final class Uppercase implements StringFilterInterface
{
    public function __invoke(string $string): string
    {
        return strtoupper($string);
    }
}
```

## Development

```bash
composer install
composer check   # check-deps, cs-check, phpstan
```

## License

MIT — see [LICENSE](LICENSE).
