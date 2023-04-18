<?php

declare(strict_types=1);

namespace Kernel;

use Exception;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;

final class Definitions
{
    /** @throws Exception */
    public static function container(string $root): ContainerInterface
    {
        $builder = new ContainerBuilder();
        self::registerDefinitions($builder, $root);

        return $builder->build();
    }

    protected static function registerDefinitions(ContainerBuilder $builder, string $root): void
    {
    }
}