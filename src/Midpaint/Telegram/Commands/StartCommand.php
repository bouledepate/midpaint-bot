<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Commands;

final class StartCommand extends Command
{
    public function execute(): Response
    {
        return new Response(true, []);
    }
}