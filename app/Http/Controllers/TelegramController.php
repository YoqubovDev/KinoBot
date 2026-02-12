<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Movie;

class TelegramController extends Controller
{
    public function handle(Request $request)
    {
        $update = $request->all();
        // Log::info('Telegram update:', $update);

        if (!isset($update['message'])) {
            return response()->json(['ok' => true]);
        }

        $chatId = $update['message']['chat']['id'];
        $token  = env('TELEGRAM_BOT_TOKEN');

        if (!isset($update['message']['text'])) {
            return response()->json(['ok' => true]);
        }

        $text = trim($update['message']['text']);

        // /start 123 format
        if (str_starts_with($text, '/start')) {
            $parts = explode(' ', $text);
            $text = $parts[1] ?? '';
        }

        // Faqat raqam
        if (!ctype_digit($text)) {
            $this->sendMessage(
                $token,
                $chatId,
                "❌ Iltimos, kino kodini raqam bilan yuboring."
            );
            return response()->json(['ok' => true]);
        }

        $code = trim($text);

        // Log::info("Searching movie code:", ['code' => $code]);

        $movie = Movie::where('code', $code)->first();

        if (!$movie) {
            $this->sendMessage(
                $token,
                $chatId,
                "😕 Kino topilmadi."
            );
            return response()->json(['ok' => true]);
        }

        // views +1
        $movie->increment('views');
        $movie->refresh();

        $channelUsername = '@kin0meda';

        $caption =
            "🔍 Kino kodi: {$movie->code}\n" .
            "🎬 Kanal: {$channelUsername}\n" .
            "🤖 Bot: @" . env('TELEGRAM_BOT_USERNAME') . "\n" .
            "👁 Ko'rishlar: {$movie->views} ta";

        $keyboard = [
            'inline_keyboard' => [
                [
                    [
                        'text' => '📤 Ulashish',
                        'switch_inline_query' => $movie->code
                    ]
                ]
            ]
        ];

        // copyMessage orqali
        if ($movie->message_id) {

            // Log::info("Sending via copyMessage");

            $response = Http::post(
                "https://api.telegram.org/bot{$token}/copyMessage",
                [
                    'chat_id' => $chatId,
                    'from_chat_id' => $movie->channel_id,
                    'message_id' => $movie->message_id,
                    'caption' => $caption,
                    'reply_markup' => json_encode($keyboard),
                ]
            );

            // Log::info('Telegram response:', $response->json());
        }

        // file_id orqali
        elseif ($movie->file_id) {

            // Log::info("Sending via sendVideo");

            $response = Http::post(
                "https://api.telegram.org/bot{$token}/sendVideo",
                [
                    'chat_id' => $chatId,
                    'video' => $movie->file_id,
                    'caption' => $caption,
                    'reply_markup' => json_encode($keyboard),
                ]
            );

            // Log::info('Telegram response:', $response->json());
        }

        else {
            $this->sendMessage(
                $token,
                $chatId,
                "⚠️ Kino mavjud, lekin video topilmadi."
            );
        }

        return response()->json(['ok' => true]);
    }

    private function sendMessage($token, $chatId, $text)
    {
        Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $text,
        ]);
    }
}
