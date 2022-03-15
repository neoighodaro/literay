<?php

use Illuminate\Support\Facades\Route;
use Neo\LiteRay\Http\Controllers\ClearController;
use Neo\LiteRay\Http\Controllers\BeaconController;
use Neo\LiteRay\Http\Controllers\DisplayController;

Route::domain(config('literay.domain'))->get('/', DisplayController::class)->name('literay.index');
Route::domain(config('literay.domain'))->get('/clear', ClearController::class)->name('literay.clear');

Route::domain(config('literay.ray_host'))
    ->post('/', BeaconController::class)
    ->name('literay.beacon')
    ->withoutMiddleware(config('literay.exclude_middlewares'));
