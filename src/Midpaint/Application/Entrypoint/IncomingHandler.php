<?php

declare(strict_types=1);

namespace Midpaint\Application\Entrypoint;

use Midpaint\Application\Telegram\TelegramObjectFactory;

final class IncomingHandler
{
    public function __construct(
        private readonly TelegramObjectFactory $factory
    )
    {
    }

    public function handle(IncomingRequest $request): IncomingResponse
    {
        $message = $this->factory->produce($request->message());

        return new IncomingResponse(true, []);
    }
}