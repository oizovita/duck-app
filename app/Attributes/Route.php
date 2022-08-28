<?php

namespace App\Attributes;

use Attribute;

#[Attribute]
class Route
{
    public array $args;

    public function __construct(string $method, string $path, array $middlewares = [], string $name = null)
    {
        $this->args = func_get_args();
    }
}
