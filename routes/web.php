<?php
// routes/web.php

use App\Http\Controllers\TelegramController;
use Illuminate\Support\Facades\Route;

Route::post('/telegram/webhook', [TelegramController::class, 'handleWebhook']);
Route::get('/telegram/set-webhook', [TelegramController::class, 'setWebhook']);
Route::get('/telegram/remove-webhook', [TelegramController::class, 'removeWebhook']);

// Admin panel uchun (keyinchalik)
Route::get('/admin/movies', function () {
    return view('admin.movies');
})->middleware('auth');