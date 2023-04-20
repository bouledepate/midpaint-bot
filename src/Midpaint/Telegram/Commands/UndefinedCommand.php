<?php

namespace Midpaint\Telegram\Commands;

final class UndefinedCommand extends Command
{
    public function execute(): Response
    {
        return new Response(true, []);
    }
}