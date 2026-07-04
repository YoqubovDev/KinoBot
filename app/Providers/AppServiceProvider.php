<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Bitta Telegram chat/callback bir vaqtda serverni band qilib qo'ymasligi uchun
        // (1/4 CPU'da bir nechta parallel so'rov tez tiqilib qoladi).
        RateLimiter::for('telegram', function (Request $request) {
            $chatId = $request->input('message.chat.id')
                ?? $request->input('callback_query.message.chat.id');

            return Limit::perSecond(1)->by($chatId ?? $request->ip());
        });
    }
}
