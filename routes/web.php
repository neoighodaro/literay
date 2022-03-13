<?php

use Illuminate\Support\Facades\Route;
use Neo\LiteRay\Http\Controllers\BeaconController;
use Neo\LiteRay\Http\Controllers\DisplayController;

Route::domain(config('literay.domain'))->get('/', DisplayController::class);

Route::domain(config('literay.ray_host'))
    ->post('/', BeaconController::class)
    ->withoutMiddleware(config('literay.exclude_middlewares'));
