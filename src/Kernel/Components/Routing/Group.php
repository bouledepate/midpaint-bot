<?php

declare(strict_types=1);

namespace Kernel\Components\Routing;

final class Group
{
    /** @var array<int, Route|Group> */
    public array $routes;
    public array $middlewares = [];

    public function __construct(
        public string $prefix
    )
    {
    }

    public static function pattern(string $prefix): self
    {
        return new self($prefix);
    }

    public function routes(Route|Group ...$routes): self
    {
        foreach ($routes as $route) {
            $this->routes[] = $route;
        }
        return $this;
    }

    public function middlewares(...$middlewares): self
    {
        foreach ($middlewares as $middleware) {
            $this->middlewares[] = $middleware;
        }
        return $this;
    }
}