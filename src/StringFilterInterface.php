<?php

declare(strict_types=1);

namespace Kaiseki\StringFilter;

interface StringFilterInterface
{
    public function __invoke(string $string): string;
}
