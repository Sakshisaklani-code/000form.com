<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewUserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param string $userEmail   The new user's email address
     * @param string $userName    The new user's display name (from form or Google profile)
     * @param string $authMethod  'email' | 'google'
     */
    public function __construct(
        public string $userEmail,
        public string $userName,
        public string $authMethod = 'email',
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'New User Registered – 000form');
    }

    public function content(): Content
    {
        return new Content(view: 'emails.new-user-registered');
    }
}