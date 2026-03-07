<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountVerificationMail extends Mailable
{
    use SerializesModels;

    public string $email;
    public string $verifyUrl;

    public function __construct(string $email, string $verifyUrl)
    {
        $this->email     = $email;
        $this->verifyUrl = $verifyUrl;
    }

    public function build()
    {
        return $this->subject('Verify your 000form account')
                    ->view('emails.account-verification');
    }
}