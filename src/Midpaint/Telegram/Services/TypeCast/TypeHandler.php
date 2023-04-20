<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Services\TypeCast;

interface TypeHandler
{
    public function next(TypeHandler $handler): TypeHandler;

    public function handle(array $data): array;
}