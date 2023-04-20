<?php

declare(strict_types=1);

use Dotenv\Dotenv;
use Kernel\Environment;

call_user_func(static function () {
    $env = Dotenv::createUnsafeImmutable(realpath(__DIR__ . '/../../'));
    $env->load();

    $env->required(['BOT_TOKEN', 'BOT_USERNAME'])->notEmpty();
    $env->required(['ERROR_DETAILS', 'LOG_ERRORS', 'LOG_ERROR_DETAILS'])->isBoolean();
    $env->required('ENVIRONMENT')->allowedValues([
        Environment::DEVELOP->value,
        Environment::PRODUCTION->value
    ]);
});