<?php

declare(strict_types=1);

use Dotenv\Dotenv;
use Kernel\Environment;

call_user_func(static function () {
    $env = Dotenv::createUnsafeImmutable(realpath(__DIR__ . '/../../'));
    $env->load();

    $env->required(['TOKEN', 'VERSION'])->notEmpty();
    $env->required(['ERROR_DETAILS', 'LOG_ERRORS', 'LOG_ERROR_DETAILS'])->isBoolean();
    $env->required('ENVIRONMENT')->allowedValues([
        Environment::DEVELOP->value,
        Environment::PRODUCTION->value
    ]);
});