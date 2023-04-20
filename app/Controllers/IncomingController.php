<?php

declare(strict_types=1);

namespace App\Controllers;

use Kernel\Environment;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Midpaint\Application\Entrypoint\IncomingHandler;
use Midpaint\Application\Entrypoint\IncomingRequest;

final class IncomingController
{
    public function __construct(
        private readonly ResponseFactoryInterface $factory,
        private readonly IncomingHandler          $handler
    )
    {
    }

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        if (Environment::current() === Environment::DEVELOP) {
            $this->debugIncomingRequest($request);
        }
        $this->handler->handle($this->createRequest($request));
        return $this->factory->createResponse(204);
    }

    private function debugIncomingRequest(ServerRequestInterface $request): void
    {
        $body = $request->getParsedBody();
        file_put_contents('incoming.json', json_encode($body));
    }

    private function createRequest(ServerRequestInterface $request): IncomingRequest
    {
        $body = $request->getParsedBody();

        return new IncomingRequest(
            id: $body['update_id'],
            message: $body['message'] ?? null
        );
    }
}