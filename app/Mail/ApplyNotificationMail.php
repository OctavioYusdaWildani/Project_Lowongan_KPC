<?php

namespace App\Mail;

use App\Models\Apply;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplyNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $lamaran;

    public function __construct(Apply $lamaran)
    {
        $this->lamaran = $lamaran;
    }

    public function build()
    {
        return $this->subject('🔔 Lamaran Baru Masuk')
                    ->view('emails.apply_notification');
    }
}
