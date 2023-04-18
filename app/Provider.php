<?php

declare(strict_types=1);

namespace App;

use Kernel\Components\Routing\Route;
use App\Controllers\TelegramController;

final class Provider
{
    public static function routes(): array
    {
        return [
            Route::post('/', TelegramController::class)
        ];
    }
}