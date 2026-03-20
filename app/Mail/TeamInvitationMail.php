<?php

namespace App\Mail;

use App\Models\TeamInvitation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TeamInvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public TeamInvitation $invitation
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '000form — You\'ve been invited to join a workspace',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.team-invitation',
            with: [
                'invitation'  => $this->invitation,
                'ownerName'   => $this->invitation->owner->name ?? $this->invitation->owner->email,
                'acceptUrl'   => $this->invitation->acceptUrl(),
                'role'        => ucfirst($this->invitation->role),
                'expiresAt'   => $this->invitation->expires_at->format('M d, Y'),
            ]
        );
    }
}