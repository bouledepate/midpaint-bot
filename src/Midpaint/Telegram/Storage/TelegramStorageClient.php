<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Storage;

use MongoDB\Collection;
use Kernel\Components\MongoDB\MongoDBClient;
use Kernel\Components\MongoDB\CollectionResolver;

final class TelegramStorageClient implements CollectionResolver
{
    protected readonly Collection $collection;

    public function __construct(
        protected readonly MongoDBClient $mongodb
    )
    {
        $this->defineCollection();
    }

    protected function defineCollection(): void
    {
        $this->collection = $this->mongodb->getDatabase()
            ->selectCollection('telegram');
    }

    public function currentCollection(): Collection
    {
        return $this->collection;
    }
}