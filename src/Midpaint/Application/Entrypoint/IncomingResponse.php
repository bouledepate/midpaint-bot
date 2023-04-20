<?php

declare(strict_types=1);

namespace Midpaint\Application\Entrypoint;

final class IncomingResponse
{
    public function __construct(
        public readonly bool   $success,
        public readonly ?array $payload
    )
    {
    }
}