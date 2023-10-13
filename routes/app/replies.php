<?php

use Illuminate\Support\Facades\Route;
use LaravelLiberu\Discussions\Http\Controllers\Reply\Destroy;
use LaravelLiberu\Discussions\Http\Controllers\Reply\Store;
use LaravelLiberu\Discussions\Http\Controllers\Reply\Update;

Route::prefix('replies')
    ->as('replies.')
    ->group(function () {
        Route::post('store', Store::class)->name('store');
        Route::patch('update/{reply}', Update::class)->name('update');
        Route::delete('destroy/{reply}', Destroy::class)->name('destroy');
    });
