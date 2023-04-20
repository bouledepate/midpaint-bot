<?php

declare(strict_types=1);

namespace Midpaint\Application\Entrypoint;

final class IncomingRequest
{
    public function __construct(
        protected readonly int    $id,
        protected readonly ?array $message
    )
    {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function message(): ?array
    {
        return $this->message;
    }
}