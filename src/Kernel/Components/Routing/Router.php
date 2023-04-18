<?php

declare(strict_types=1);

namespace Kernel\Components\Routing;

use Slim\App;

final class Router
{
    public static function apply(App $app, Route|Group ...$routes): void
    {
        foreach ($routes as $route) {
            match ($route::class) {
                Route::class => self::applyRoute($app, $route),
                Group::class => self::applyGroup($app, $route)
            };
        }
    }

    protected static function applyRoute(App $app, Route $route): void
    {
        $r = $app->map($route->method, $route->pattern, $route->handler);
        array_walk($route->middlewares, fn($middleware) => $r->add($middleware));
    }

    protected static function applyGroup(App $app, Group $group): void
    {
        $g = $app->group($group->prefix, fn(App $app) => self::apply($app, ...$group->routes));
        array_walk($group->middlewares, fn($middleware) => $g->add($middleware));
    }
}