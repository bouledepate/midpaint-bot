<?php

declare(strict_types=1);

namespace App;

use App\Controllers\CommandController;
use Kernel\Components\Routing\Route;

final class Provider
{
    public static function routes(): array
    {
        return [
            Route::any('/', CommandController::class)
        ];
    }
}