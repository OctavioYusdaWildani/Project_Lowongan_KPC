<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\TelegramUser;
    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Facades\Log;

    class TelegramBotController extends Controller
    {
        public function handle(Request $request)
        {
            Log::info('Webhook masuk'); 
            
            $data = $request->all();
            Log::info('Telegram webhook payload: ' . json_encode($data));

            // Jika ada teks pesan dan teksnya /start
            if (isset($data['message']['text']) && trim($data['message']['text']) === '/start') {
                $chatId   = $data['message']['chat']['id'];
                $firstName = $data['message']['chat']['first_name'] ?? '';
                $username  = $data['message']['chat']['username'] ?? '';

                // Simpan info user jika belum ada
                TelegramUser::updateOrCreate(
                    ['chat_id' => $chatId],
                    ['name' => $firstName, 'username' => $username]
                );

                $this->sendRoleSelection($chatId);
            }

            // Callback dari inline keyboard
            if (isset($data['callback_query'])) {
                $chatId   = $data['callback_query']['from']['id'];
                $role     = $data['callback_query']['data'];
                $queryId  = $data['callback_query']['id'];

                // Update role user
                TelegramUser::updateOrCreate(
                    ['chat_id' => $chatId],
                    ['role' => $role]
                );

                // Tanggapi callback agar tombol tidak loading terus
                $token = env('TELEGRAM_BOT_TOKEN');
                Http::post("https://api.telegram.org/bot{$token}/answerCallbackQuery", [
                    'callback_query_id' => $queryId,
                    'text' => '✅ Role telah disimpan sebagai: ' . ucfirst(str_replace('_', ' ', $role)),
                    'show_alert' => false,
                ]);

                $this->sendMessage($chatId, "🎉 Kamu telah terdaftar sebagai <b>" . ucfirst(str_replace('_', ' ', $role)) . "</b>", 'HTML');
            }

            return response()->json(['ok' => true]);
        }

        private function sendRoleSelection($chatId)
        {
            $keyboard = [
                'inline_keyboard' => [
                    [
                        ['text' => 'Manager', 'callback_data' => 'department_manager'],
                        ['text' => 'Director', 'callback_data' => 'director'],
                        ['text' => 'HR Manager', 'callback_data' => 'hr_manager'],
                    ],
                ],
            ];

            $this->sendMessage($chatId, "Silakan pilih role kamu:", 'HTML', $keyboard);
        }

        private function sendMessage($chatId, $text, $parseMode = null, $replyMarkup = null)
        {
            $data = ['chat_id' => $chatId, 'text' => $text];
            if ($parseMode) $data['parse_mode'] = $parseMode;
            if ($replyMarkup) $data['reply_markup'] = json_encode($replyMarkup);

            $token = env('TELEGRAM_BOT_TOKEN');
            Http::post("https://api.telegram.org/bot{$token}/sendMessage", $data);
        }
    }
