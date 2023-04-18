<?php

declare(strict_types=1);

namespace Kernel\Components\Routing;

final class Route
{
    public array $middlewares = [];

    public function __construct(
        public array        $method,
        public string       $pattern,
        public array|string $handler
    )
    {
    }

    public static function any(string $pattern, array|string $handler): self
    {
        return new self(['GET', 'POST', 'DELETE', 'PUT', 'PATCH', 'OPTIONS'], $pattern, $handler);
    }

    public static function map(array $method, string $pattern, array|string $handler): self
    {
        return new self($method, $pattern, $handler);
    }

    public function middleware($middleware): self
    {
        $this->middlewares[] = $middleware;
        return $this;
    }
}