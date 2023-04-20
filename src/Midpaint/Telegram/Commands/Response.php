<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Commands;

final class Response
{
    public function __construct(
        protected readonly bool  $success,
        protected readonly array $payload = []
    )
    {
    }

    /**
     * @return array
     */
    public function getPayload(): array
    {
        return $this->payload;
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }
}