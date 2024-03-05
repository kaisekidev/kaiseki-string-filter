<?php

declare(strict_types=1);

namespace Kaiseki\StringFilter;

use InvalidArgumentException;

use function count;
use function is_string;
use function preg_replace;

final class PregReplaceStringFilter implements StringFilterInterface
{
    /**
     * @param list<string> $pattern
     * @param list<string> $replacement
     */
    public function __construct(private readonly array $pattern, private readonly array $replacement)
    {
        if (count($pattern) !== count($replacement)) {
            throw new InvalidArgumentException('Length of pattern and replacement must match');
        }
    }

    public function __invoke(string $string): string
    {
        $value = preg_replace($this->pattern, $this->replacement, $string);

        return is_string($value) ? $value : $string;
    }
}
