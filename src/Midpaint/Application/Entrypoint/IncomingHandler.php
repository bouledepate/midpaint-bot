<?php

declare(strict_types=1);

namespace Midpaint\Application\Entrypoint;

use Exception;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;
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

    /** @throws TelegramException */
    public function handle(IncomingRequest $request): void
    {
       if ($this->validate($request)) {
           $msg = $this->factory->produce($request->message());
           $cmd = $this->resolver->resolve($msg);

           try {
               $cmd?->execute($msg);
           } catch (Exception $exception) {
               Request::sendMessage([
                   'chat_id' => $msg->chat()->ID(),
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