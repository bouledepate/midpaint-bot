<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Commands;

abstract class Command
{
    abstract public function execute(): Response;
}