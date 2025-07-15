<?php

namespace App\Mail;

use App\Models\Ptk;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PtkNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ptk;
    public $messageText;

    public function __construct(Ptk $ptk, $messageText)
    {
        $this->ptk = $ptk;
        $this->messageText = $messageText;
    }

    public function build()
    {
        return $this->subject('Notifikasi PTK - ' . $this->messageText)
                    ->view('emails.ptk_notification');
    }
}
