<?php

namespace App;

use App\Controllers\IncomingController;
use Kernel\Components\Routing\Route;

final class Provider
{
    public static function routes(): array
    {
        return [
            Route::post('/', IncomingController::class)
        ];
    }
}