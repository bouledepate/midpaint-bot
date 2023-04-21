<?php

declare(strict_types=1);

namespace Kernel;

use Exception;
use DI\ContainerBuilder;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Kernel\Components\MongoDB\MongoDBClient;
use Midpaint\Telegram\Storage\TelegramStorageClient;
use Midpaint\Application\Entrypoint\IncomingHandler;
use Midpaint\Telegram\Services\Command\CommandResolver;
use Midpaint\Application\Telegram\TelegramObjectFactory;
use Midpaint\Telegram\Services\TypeCast\TypeCastFactory;
use Midpaint\Application\Telegram\TelegramCommandResolver;

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
            MongoDBClient::class => create(MongoDBClient::class),
            ResponseFactoryInterface::class => create(Psr17Factory::class)->constructor(),
            TelegramObjectFactory::class => get(TypeCastFactory::class),
            TelegramCommandResolver::class => get(CommandResolver::class),
            IncomingHandler::class => create(IncomingHandler::class)->constructor(
                get(ContainerInterface::class),
                get(TelegramObjectFactory::class),
                get(TelegramCommandResolver::class)
            ),
            TelegramStorageClient::class => create(TelegramStorageClient::class)->constructor(
                get(MongoDBClient::class)
            )
        ]);
    }
}