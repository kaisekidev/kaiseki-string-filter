<?php

declare(strict_types=1);

namespace Kaiseki\StringFilter;

use function Safe\preg_replace;

final class RemoveDoubleAngleBracketsStringFilter implements StringFilterInterface
{
    public function __invoke(string $string): string
    {
        $pattern = "/<<([^>]+)>>/";
        $replace = "$1";

        return preg_replace($pattern, $replace, $string);
    }
}
