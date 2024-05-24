<?php

use App\Http\Controllers\UrlController;

Route::get('/', [UrlController::class, 'index'])->name('index');
Route::post('/shorten', [UrlController::class, 'store'])->name('shorten');
Route::get('/{short_url}', [UrlController::class, 'redirect'])->name('redirect');
