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

        if (isset($update['callback_query'])) {
            return $this->handleCallbackQuery($update['callback_query']);
        }

        if (!isset($update['message']) || !isset($update['message']['text'])) {
            return response()->json(['ok' => true]);
        }

        $chatId = $update['message']['chat']['id'];
        $token  = env('TELEGRAM_BOT_TOKEN');
        $text = trim($update['message']['text']);

        // /start 123 format or /start
        if (str_starts_with($text, '/start')) {
            $parts = explode(' ', $text);
            if (isset($parts[1]) && trim($parts[1]) !== '') {
                $text = $parts[1];
            } else {
                $this->sendWelcomeMessage($token, $chatId);
                return response()->json(['ok' => true]);
            }
        }

        // Serial + button handler
        if ($text === 'Serial +') {
            $this->sendSerialsList($token, $chatId);
            return response()->json(['ok' => true]);
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

        Log::info("Searching movie code:", ['code' => $code]);

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

        $sent = false;

        // copyMessage orqali harakat qilamiz
        if ($movie->message_id && $movie->channel_id) {
            Log::info("Attempting via copyMessage");
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

            if ($response->successful()) {
                $sent = true;
                Log::info('copyMessage successful');
            } else {
                Log::error('copyMessage failed, falling back to sendVideo', ['response' => $response->json()]);
            }
        }

        // file_id orqali (fallback yoki message_id yo'q bo'lsa)
        if (!$sent && $movie->file_id) {
            Log::info("Attempting via sendVideo");
            $response = Http::post(
                "https://api.telegram.org/bot{$token}/sendVideo",
                [
                    'chat_id' => $chatId,
                    'video' => $movie->file_id,
                    'caption' => $caption,
                    'reply_markup' => json_encode($keyboard),
                ]
            );

            if ($response->successful()) {
                $sent = true;
                Log::info('sendVideo successful');
            } else {
                Log::error('sendVideo failed', ['response' => $response->json()]);
            }
        }

        if (!$sent) {
            $this->sendMessage(
                $token,
                $chatId,
                "⚠️ Video yuborishda xatolik yuz berdi."
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

    private function sendWelcomeMessage($token, $chatId)
    {
        $keyboard = [
            'keyboard' => [
                [
                    ['text' => 'Serial +']
                ]
            ],
            'resize_keyboard' => true,
        ];

        Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => "Salom! Kino kodini yuboring yoki quyidagi menyudan foydalaning.",
            'reply_markup' => json_encode($keyboard),
        ]);
    }

    private function sendSerialsList($token, $chatId)
    {
        $serials = \App\Models\Serial::all();
        if ($serials->isEmpty()) {
            $this->sendMessage($token, $chatId, "Hozircha seriallar yo'q.");
            return;
        }

        $buttons = [];
        foreach ($serials as $serial) {
            $buttons[][] = [
                'text' => $serial->name,
                'callback_data' => 'serial_' . $serial->id
            ];
        }

        Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => "Seriallardan birini tanlang:",
            'reply_markup' => json_encode(['inline_keyboard' => $buttons]),
        ]);
    }

    private function handleCallbackQuery($callbackQuery)
    {
        $data = $callbackQuery['data'];
        $chatId = $callbackQuery['message']['chat']['id'];
        $messageId = $callbackQuery['message']['message_id'];
        $token = env('TELEGRAM_BOT_TOKEN');

        Http::post("https://api.telegram.org/bot{$token}/answerCallbackQuery", [
            'callback_query_id' => $callbackQuery['id']
        ]);

        if (str_starts_with($data, 'serial_')) {
            $serialId = str_replace('serial_', '', $data);
            $this->sendEpisodesList($token, $chatId, $messageId, $serialId);
        } elseif (str_starts_with($data, 'episode_')) {
            $episodeId = str_replace('episode_', '', $data);
            $this->sendEpisodeVideo($token, $chatId, $episodeId);
        } elseif ($data === 'back_to_serials') {
            $this->editToSerialsList($token, $chatId, $messageId);
        }

        return response()->json(['ok' => true]);
    }

    private function sendEpisodesList($token, $chatId, $messageId, $serialId)
    {
        $serial = \App\Models\Serial::find($serialId);
        $episodes = \App\Models\SerialEpisode::where('serial_id', $serialId)->orderBy('episode_number')->get();

        if (!$serial || $episodes->isEmpty()) {
            Http::post("https://api.telegram.org/bot{$token}/editMessageText", [
                'chat_id' => $chatId,
                'message_id' => $messageId,
                'text' => "Bu serialning qismlari hozircha yo'q."
            ]);
            return;
        }

        $buttons = [];
        $row = [];
        foreach ($episodes as $episode) {
            $row[] = [
                'text' => $episode->episode_number . '-qism',
                'callback_data' => 'episode_' . $episode->id,
            ];
            
            if (count($row) == 3) {
                $buttons[] = $row;
                $row = [];
            }
        }
        if (!empty($row)) {
            $buttons[] = $row;
        }

        $buttons[] = [
            [
                'text' => '🔙 Orqaga',
                'callback_data' => 'back_to_serials'
            ]
        ];

        Http::post("https://api.telegram.org/bot{$token}/editMessageText", [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'text' => "🎬 *{$serial->name}*\n\nQismlardan birini tanlang:",
            'parse_mode' => 'Markdown',
            'reply_markup' => json_encode(['inline_keyboard' => $buttons])
        ]);
    }

    private function editToSerialsList($token, $chatId, $messageId)
    {
        $serials = \App\Models\Serial::all();
        if ($serials->isEmpty()) {
            Http::post("https://api.telegram.org/bot{$token}/editMessageText", [
                'chat_id' => $chatId,
                'message_id' => $messageId,
                'text' => "Hozircha seriallar yo'q."
            ]);
            return;
        }

        $buttons = [];
        foreach ($serials as $serial) {
            $buttons[][] = [
                'text' => $serial->name,
                'callback_data' => 'serial_' . $serial->id
            ];
        }

        Http::post("https://api.telegram.org/bot{$token}/editMessageText", [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'text' => "Seriallardan birini tanlang:",
            'reply_markup' => json_encode(['inline_keyboard' => $buttons]),
        ]);
    }

    private function sendEpisodeVideo($token, $chatId, $episodeId)
    {
        $episode = \App\Models\SerialEpisode::with('serial')->find($episodeId);
        if (!$episode) {
            $this->sendMessage($token, $chatId, "😕 Qism topilmadi.");
            return;
        }

        // Epizodga bog'langan Movie ma'lumotlarini topamiz
        $movieName = "{$episode->serial->name} {$episode->episode_number}-qism";
        $movie = Movie::where('name', $movieName)->first();
        
        if (!$movie) {
            $movie = Movie::where('file_id', $episode->file_id)->first();
        }

        if ($movie) {
            $movie->increment('views');
            $movie->refresh();
            $code = $movie->code;
            $views = $movie->views;
        } else {
            $code = "Mavjud emas";
            $views = 0;
        }

        $channelUsername = '@kin0meda';
        $caption = "🎬 <b>Serial:</b> {$episode->serial->name}\n" .
                   "🔢 <b>Qism:</b> {$episode->episode_number}\n" .
                   "🔍 <b>Kino kodi:</b> {$code}\n" .
                   "🎬 <b>Kanal:</b> {$channelUsername}\n" .
                   "👁 <b>Ko'rishlar:</b> {$views} ta\n\n" .
                   "🤖 <b>Bot:</b> @" . env('TELEGRAM_BOT_USERNAME');

        $keyboard = [
            'inline_keyboard' => [
                [
                    [
                        'text' => '📤 Ulashish',
                        'switch_inline_query' => $code
                    ]
                ]
            ]
        ];

        $sent = false;

        if ($movie && $movie->message_id && $movie->channel_id) {
            $response = Http::post("https://api.telegram.org/bot{$token}/copyMessage", [
                'chat_id' => $chatId,
                'from_chat_id' => $movie->channel_id,
                'message_id' => $movie->message_id,
                'caption' => $caption,
                'parse_mode' => 'HTML',
                'reply_markup' => json_encode($keyboard),
            ]);
            if ($response->successful()) $sent = true;
        }

        if (!$sent) {
            Http::post("https://api.telegram.org/bot{$token}/sendVideo", [
                'chat_id' => $chatId,
                'video' => $episode->file_id,
                'caption' => $caption,
                'parse_mode' => 'HTML',
                'reply_markup' => json_encode($keyboard),
            ]);
        }
    }
}