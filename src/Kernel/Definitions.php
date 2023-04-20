<?php

declare(strict_types=1);

namespace Kernel;

use Exception;
use DI\ContainerBuilder;
use Midpaint\Application\Telegram\TelegramCommandResolver;
use Midpaint\Telegram\Services\Command\CommandResolver;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Midpaint\Application\Entrypoint\IncomingHandler;
use Midpaint\Application\Telegram\TelegramObjectFactory;
use Midpaint\Telegram\Services\TypeCast\TypeCastFactory;

use function DI\create;
use function DI\get;

final class Definitions
{
    /** @throws Exception */
    public static function container(): ContainerInterface
    {
        $builder = new ContainerBuilder();
        self::registerDependencies($builder);

        return $builder->build();
    }

    protected static function registerDependencies(ContainerBuilder $builder): void
    {
        $builder->addDefinitions([
            ResponseFactoryInterface::class => create(Psr17Factory::class)->constructor(),
            TelegramObjectFactory::class => get(TypeCastFactory::class),
            TelegramCommandResolver::class => get(CommandResolver::class),
            IncomingHandler::class => create(IncomingHandler::class)->constructor(
                get(TelegramObjectFactory::class),
                get(TelegramCommandResolver::class)
            )
        ]);
    }
}