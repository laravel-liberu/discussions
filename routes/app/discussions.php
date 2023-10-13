<?php

use Illuminate\Support\Facades\Route;
use LaravelLiberu\Discussions\Http\Controllers\Discussion\Destroy;
use LaravelLiberu\Discussions\Http\Controllers\Discussion\Index;
use LaravelLiberu\Discussions\Http\Controllers\Discussion\Store;
use LaravelLiberu\Discussions\Http\Controllers\Discussion\Update;

Route::get('', Index::class)->name('index');
Route::post('', Store::class)->name('store');
Route::patch('{discussion}', Update::class)->name('update');
Route::delete('{discussion}', Destroy::class)->name('destroy');
