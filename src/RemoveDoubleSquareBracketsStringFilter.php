<?php

declare(strict_types=1);

namespace Kaiseki\StringFilter;

use function is_string;
use function preg_replace;

final class RemoveDoubleSquareBracketsStringFilter implements StringFilterInterface
{
    public function __invoke(string $string): string
    {
        $pattern = "/\[\[([^\]]+)\]\]/";
        $replace = '$1';

        $value = preg_replace($pattern, $replace, $string);

        return is_string($value) ? $value : $string;
    }
}
