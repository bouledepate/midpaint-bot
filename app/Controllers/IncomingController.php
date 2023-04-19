<?php

declare(strict_types=1);

namespace App\Controllers;

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
        return $this->factory->createResponse(204);
    }
}