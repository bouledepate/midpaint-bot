<?php

declare(strict_types=1);

namespace App\Controllers;

use Longman\TelegramBot\Request;
use Longman\TelegramBot\Telegram;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class IncomingController
{
    public function __construct(
        private ResponseFactoryInterface $factory
    )
    {
    }

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $bot = new Telegram($_ENV['TOKEN']);
        $body = $request->getParsedBody();

        file_put_contents('a.json', json_encode($body));

        $payload = [
            'chat_id' => $body['message']['chat']['id'],
            'text' => $body['message']['text']
        ];

        Request::sendMessage($payload);

        return $this->factory->createResponse(204);
    }
}