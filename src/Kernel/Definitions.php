<?php

declare(strict_types=1);

namespace Kernel;

use Exception;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseFactoryInterface;

use function DI\create;
use function DI\get;

final class Definitions
{
    /** @throws Exception */
    public static function container(string $root): ContainerInterface
    {
        $builder = new ContainerBuilder();
        self::registerDependencies($builder, $root);

        return $builder->build();
    }

    protected static function registerDependencies(ContainerBuilder $builder, string $root): void
    {
        $builder->addDefinitions([
            ResponseFactoryInterface::class => create(Psr17Factory::class)->constructor()
        ]);
    }
}