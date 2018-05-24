<?php

define('LARAVEL_START', microtime(true));

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
/** @var \Illuminate\Foundation\Console\Kernel $consoleKernel */
$consoleKernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$app = new \Bref\Application;
$app->httpHandler(new Bref\Bridge\Laravel\LaravelAdapter($kernel));
$app->run();
