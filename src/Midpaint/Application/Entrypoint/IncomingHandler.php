<?php

declare(strict_types=1);

namespace Midpaint\Application\Entrypoint;

use Exception;
use DI\Container;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;
use Midpaint\Application\Telegram\TelegramCommandResolver;
use Midpaint\Application\Telegram\TelegramObjectFactory;
use Midpaint\Telegram\Command\Command;
use Midpaint\Telegram\Storage\TelegramRepository;

final class IncomingHandler
{
    public function __construct(
        private readonly Container               $container,
        private readonly TelegramObjectFactory   $factory,
        private readonly TelegramCommandResolver $resolver
    )
    {
    }

    /** @throws TelegramException */
    public function handle(IncomingRequest $request): void
    {
        if ($this->validate($request)) {
            $message = $this->factory->produce($request->message());
            $command = $this->resolver->resolve($message);

            try {
                /** @var Command $command */
                (new $command($this->container->get(TelegramRepository::class)))->execute($message);
            } catch (Exception $exception) {
                Request::sendMessage([
                    'chat_id' => $message->chat()->ID()->value(),
                    'text' => 'Во время обработки запроса произошла ошибка. Пожалуйста, попробуйте позднее.'
                ]);
            }
        }
    }

    private function validate(IncomingRequest $request): bool
    {
        return !is_null($request->message());
    }
}