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
        Log::info('Telegram update:', $update);

        if (!isset($update['message'])) {
            return response()->json(['ok' => true]);
        }

        $chatId = $update['message']['chat']['id'];
        $token  = env('TELEGRAM_BOT_TOKEN');

        // 👤 USER TEXT (kino kodi)
        if (isset($update['message']['text'])) {
            $code = trim($update['message']['text']);

            // faqat raqam bo‘lsa qidiramiz
            if (!ctype_digit($code)) {
                $this->sendMessage($token, $chatId, "❌ Iltimos, kino kodini raqam bilan yuboring.");
                return response()->json(['ok' => true]);
            }

            // 🎬 DB dan qidiramiz
            $movie = Movie::where('code', $code)->first();

            if (!$movie) {
                $this->sendMessage($token, $chatId, "😕 Kino topilmadi.");
                return response()->json(['ok' => true]);
            }

            // 👁 ko‘rishlar soni +1
            $movie->increment('views');

            // 📤 Kanal postidan botga yuboramiz
            if ($movie->message_id) {
                Http::post("https://api.telegram.org/bot{$token}/copyMessage", [
                    'chat_id' => $chatId,
                    'from_chat_id' => env('TELEGRAM_CHANNEL_USERNAME'),
                    'message_id' => $movie->message_id,
                ]);
            }
            // Agar message_id bo‘lmasa → file_id bilan yuboramiz
            elseif ($movie->file_id) {
                Http::post("https://api.telegram.org/bot{$token}/sendVideo", [
                    'chat_id' => $chatId,
                    'video' => $movie->file_id,
                    'caption' => "🎬 Kino kodi: {$movie->code}\n👁 Ko'rishlar soni: {$movie->views}",
                    'parse_mode' => 'HTML',
                    'disable_web_page_preview' => true,
                    'reply_to_message_id' => $update['message']['message_id'] ?? null,
                ]);
            } else {
                $this->sendMessage($token, $chatId, "⚠️ Kino mavjud, lekin fayl topilmadi.");
            }
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
