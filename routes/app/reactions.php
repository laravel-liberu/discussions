<?php

use Illuminate\Support\Facades\Route;
use LaravelLiberu\Discussions\Http\Controllers\Reaction\Toggle;

Route::prefix('reactions')
    ->as('reactions.')
    ->group(function () {
        Route::post('toggle', Toggle::class)->name('toggle');
    });
