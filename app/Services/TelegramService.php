<?php
// app/Services/TelegramService.php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramService
{
    private $botToken;
    private $apiUrl = 'https://api.telegram.org';

    public function __construct()
    {
        $this->botToken = env('TELEGRAM_BOT_TOKEN');
    }

    /**
     * ODDIY XABAR JO'NATISH
     * $telegram->sendMessage(123456, 'Salom!');
     */
    public function sendMessage($chatId, $text, $parseMode = 'HTML')
    {
        return $this->makeRequest('sendMessage', [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => $parseMode,
        ]);
    }

    /**
     * FOTO JO'NATISH
     * $telegram->sendPhoto(123456, 'https://example.com/photo.jpg', 'Foto!'');
     */
    public function sendPhoto($chatId, $photoUrl, $caption = '')
    {
        return $this->makeRequest('sendPhoto', [
            'chat_id' => $chatId,
            'photo' => $photoUrl,
            'caption' => $caption,
            'parse_mode' => 'HTML',
        ]);
    }

    /**
     * VIDEO JO'NATISH
     * $telegram->sendVideo(123456, 'https://example.com/video.mp4', 'Video!');
     */
    public function sendVideo($chatId, $videoUrl, $caption = '')
    {
        return $this->makeRequest('sendVideo', [
            'chat_id' => $chatId,
            'video' => $videoUrl,
            'caption' => $caption,
            'parse_mode' => 'HTML',
        ]);
    }

    /**
     * KANAL POSTINI FORWARD QILISH (ASOSIY)
     * $telegram->forwardMessage(123456, '@kino_channel', 2);
     */
    public function forwardMessage($chatId, $fromChatId, $messageId)
    {
        return $this->makeRequest('forwardMessage', [
            'chat_id' => $chatId,
            'from_chat_id' => $fromChatId,
            'message_id' => (int)$messageId,
        ]);
    }

    /**
     * TUGMALI XABAR (INLINE BUTTONS)
     * $telegram->sendMessageWithButtons(
     *     123456,
     *     'Tanlov qiling:',
     *     [
     *         [
     *             ['text' => 'Avatar', 'callback_data' => 'movie_101'],
     *             ['text' => 'Inception', 'callback_data' => 'movie_102'],
     *         ]
     *     ]
     * );
     */
    public function sendMessageWithButtons($chatId, $text, $buttons)
    {
        return $this->makeRequest('sendMessage', [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'inline_keyboard' => $buttons
            ])
        ]);
    }

    /**
     * CALLBACK QUERY JAVOB (TUGMA BOSILDYDA)
     * $telegram->answerCallbackQuery(callback_query_id, 'Kino jo\'natildi!');
     */
    public function answerCallbackQuery($callbackQueryId, $text, $showAlert = false)
    {
        return $this->makeRequest('answerCallbackQuery', [
            'callback_query_id' => $callbackQueryId,
            'text' => $text,
            'show_alert' => $showAlert,
        ]);
    }

    /**
     * KEYBOARD BILAN XABAR
     */
    public function sendMessageWithKeyboard($chatId, $text, $buttons)
    {
        return $this->makeRequest('sendMessage', [
            'chat_id' => $chatId,
            'text' => $text,
            'reply_markup' => json_encode([
                'keyboard' => $buttons,
                'resize_keyboard' => true,
                'one_time_keyboard' => true,
            ])
        ]);
    }

    /**
     * FAYL JO'NATISH (DOC, PDF, AUDIO)
     */
    public function sendDocument($chatId, $fileUrl, $caption = '')
    {
        return $this->makeRequest('sendDocument', [
            'chat_id' => $chatId,
            'document' => $fileUrl,
            'caption' => $caption,
        ]);
    }

    /**
     * USER INFO OLISH
     */
    public function getMe()
    {
        return $this->makeRequest('getMe');
    }

    /**
     * CHAT INFO OLISH
     */
    public function getChat($chatId)
    {
        return $this->makeRequest('getChat', [
            'chat_id' => $chatId
        ]);
    }

    /**
     * MESSAGE TAHRIRLASH
     */
    public function editMessageText($chatId, $messageId, $text)
    {
        return $this->makeRequest('editMessageText', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'text' => $text,
            'parse_mode' => 'HTML',
        ]);
    }

    /**
     * MESSAGE O'CHIRISH
     */
    public function deleteMessage($chatId, $messageId)
    {
        return $this->makeRequest('deleteMessage', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
        ]);
    }

    /**
     * WEBHOOK O'RNATISH
     */
    public function setWebhook($url)
    {
        return $this->makeRequest('setWebhook', [
            'url' => $url,
            'allowed_updates' => ['message', 'callback_query']
        ]);
    }

    /**
     * WEBHOOK O'CHIRISH
     */
    public function deleteWebhook()
    {
        return $this->makeRequest('deleteWebhook');
    }

    /**
     * WEBHOOK INFO
     */
    public function getWebhookInfo()
    {
        return $this->makeRequest('getWebhookInfo');
    }

    /**
     * ASOSIY REQUEST FUNCTION
     */
    private function makeRequest($method, $params = [])
    {
        try {
            $url = "{$this->apiUrl}/bot{$this->botToken}/{$method}";
            
            $response = Http::post($url, $params);

            if ($response->successful()) {
                return $response->json();
            }

            Log::error("Telegram API error [{$method}]: " . $response->body());
            return ['ok' => false, 'error' => $response->body()];

        } catch (\Exception $e) {
            Log::error("Telegram request exception: " . $e->getMessage());
            return ['ok' => false, 'error' => $e->getMessage()];
        }
    }
}

// ========================================
// CONTROLLER'DA ISHLATISH
// ========================================

// app/Http/Controllers/TelegramController.php'da:
/*
use App\Services\TelegramService;

class TelegramController extends Controller
{
    public function handle(Request $request, TelegramService $telegram)
    {
        $chatId = $request->input('message.chat.id');
        $text = $request->input('message.text');
        
        // Bitta qatorda!
        $telegram->sendMessage($chatId, "Salom!");
        
        // Buttons bilan
        $telegram->sendMessageWithButtons(
            $chatId,
            "Kinoni tanlang:",
            [
                [
                    ['text' => '🎬 Avatar', 'callback_data' => 'movie_101'],
                    ['text' => '🎬 Inception', 'callback_data' => 'movie_102'],
                ]
            ]
        );
    }
}
*/