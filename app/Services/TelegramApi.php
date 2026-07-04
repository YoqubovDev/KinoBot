<?php

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class TelegramApi
{
    private string $token;

    public function __construct(?string $token = null)
    {
        $this->token = $token ?? config('telegram.token');
    }

    public function call(string $method, array $params = []): Response
    {
        return Http::timeout(10)->post("https://api.telegram.org/bot{$this->token}/{$method}", $params);
    }
}
