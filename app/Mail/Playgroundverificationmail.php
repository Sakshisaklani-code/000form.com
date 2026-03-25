<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PlaygroundVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $recipientEmail;
    public string $verifyUrl;

    public function __construct(string $recipientEmail, string $verifyUrl)
    {
        $this->recipientEmail = $recipientEmail;
        $this->verifyUrl      = $verifyUrl;
    }

    public function build(): static
    {
        return $this
            ->subject('Verify your email — ' . config('app.name') . ' Express')
            ->view('emails.playground-verification')
            ->with([
                'recipientEmail' => $this->recipientEmail,
                'verifyUrl'      => $this->verifyUrl,
                'appName'        => config('app.name'),
                'appUrl'         => config('app.url'),
            ]);
    }
}