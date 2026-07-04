<?php
// routes/web.php

use App\Http\Controllers\TelegramController;
use Illuminate\Support\Facades\Route;

Route::get('/telegram/set-webhook', [TelegramController::class, 'setWebhook']);
Route::get('/telegram/remove-webhook', [TelegramController::class, 'removeWebhook']);