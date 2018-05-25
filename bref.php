<?php

define('LARAVEL_START', microtime(true));

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

// Laravel does not create that directory automatically so we have to create it
if (!is_dir(storage_path('framework/views'))) {
    if (!mkdir(storage_path('framework/views'), 0755, true)) {
        die('Cannot create directory ' . storage_path('framework/views'));
    }
}

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$app = new \Bref\Application;
$app->httpHandler(new Bref\Bridge\Laravel\LaravelAdapter($kernel));
$app->run();
