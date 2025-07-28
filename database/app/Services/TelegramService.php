<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TelegramService
{
    public static function sendMessage($message)
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        $chat_id = env('TELEGRAM_CHAT_ID');

        $url = "https://api.telegram.org/bot{$token}/sendMessage";

        $response = Http::get($url, [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'HTML'
        ]);

        return $response->successful();
    }
}
// This service class is responsible for sending messages to a Telegram chat using the Telegram Bot API.