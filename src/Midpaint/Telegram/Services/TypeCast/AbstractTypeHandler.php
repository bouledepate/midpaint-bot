<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Services\TypeCast;

abstract class AbstractTypeHandler implements TypeHandler
{
    private ?TypeHandler $nextHandler = null;

    protected abstract function field(): string;

    public function next(TypeHandler $handler): TypeHandler
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(array $data): array
    {
        if (!is_null($this->nextHandler)) {
            return $this->nextHandler->handle($data);
        }

        return $data;
    }
}