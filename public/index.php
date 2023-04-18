<?php

use Kernel\Kernel;

require dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/src/Kernel/bootstrap.php';


try {
    $application = new Kernel();
    $application->run();
} catch (Throwable $exception) {
    file_put_contents(
        'php://stderr',
        "Something went wrong: "
        . $exception->getMessage() . " | "
        . $exception->getTraceAsString() . " | "
        . $exception->getFile() . " | "
        . $exception->getLine()
    );
}