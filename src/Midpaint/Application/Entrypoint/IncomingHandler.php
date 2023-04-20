<?php

declare(strict_types=1);

namespace Midpaint\Application\Entrypoint;

use Midpaint\Application\Telegram\TelegramCommandResolver;
use Midpaint\Application\Telegram\TelegramObjectFactory;

final class IncomingHandler
{
    public function __construct(
        private readonly TelegramObjectFactory   $factory,
        private readonly TelegramCommandResolver $resolver
    )
    {
    }

    public function handle(IncomingRequest $request): void
    {
        if (is_null($request->message())) {
            return;
        }

        $message = $this->factory->produce($request->message());
        $command = $this->resolver->resolve($message);

        if (!$command) {
            return;
        }

        $response = $command->execute();
    }
}