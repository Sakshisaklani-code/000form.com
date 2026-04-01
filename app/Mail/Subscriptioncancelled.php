<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubscriptionCancelled extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string      $userEmail,
        public string|int  $userId,
        public string      $planName,
        public string      $billingCycle,
        public bool        $isAdminCopy,
        // ── cancel vs cancel-scheduled ────────────────────────
        // type: 'subscription' | 'scheduled_change'
        public string      $cancelType       = 'subscription',
        // For subscription cancel: access end date
        public ?string     $accessUntil      = null,
        // For scheduled-change cancel: what plan was cancelled
        public ?string     $cancelledNewPlan    = null,
        public ?string     $cancelledNewBilling = null,
        public ?string     $subscriptionId   = null,
        public ?string     $paddleCustomerId = null,
    ) {}

    public function envelope(): Envelope
    {
        if ($this->isAdminCopy) {
            $subject = $this->cancelType === 'scheduled_change'
                ? '000form Scheduled Upgrade Cancelled – ' . $this->userEmail
                : '000form Subscription Cancelled – ' . $this->userEmail;
        } else {
            $subject = $this->cancelType === 'scheduled_change'
                ? '000form Your scheduled upgrade has been cancelled'
                : '000form Your subscription has been cancelled';
        }

        return new Envelope(subject: $subject);
    }

    public function content(): Content
    {
        return new Content(
            view: $this->isAdminCopy
                ? 'emails.subscription-cancelled-admin'
                : 'emails.subscription-cancelled-user',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}