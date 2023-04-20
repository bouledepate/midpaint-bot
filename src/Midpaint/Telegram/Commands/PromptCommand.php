<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Commands;

final class PromptCommand extends Command
{

    public function execute(): Response
    {
        return new Response(true, []);
    }
}