<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubscriptionResumed extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly string  $userEmail,
        public readonly string|int     $userId,
        public readonly string  $planName,
        public readonly string  $billingCycle,
        public readonly bool    $isAdminCopy,
        public readonly ?string $accessUntil      = null,   // next billing date / period end
        public readonly ?string $subscriptionId   = null,
        public readonly ?string $paddleCustomerId = null,
    ) {}

    public function envelope(): Envelope
    {
        $subject = $this->isAdminCopy
            ? "[Admin] Subscription Reactivated – {$this->userEmail}"
            : 'Your subscription has been reactivated';

        return new Envelope(subject: $subject);
    }

    public function content(): Content
    {
        $view = $this->isAdminCopy
            ? 'emails.subscription-resumed-admin'
            : 'emails.subscription-resumed';

        return new Content(
            view: $view,
            with: [
                'userEmail'       => $this->userEmail,
                'userId'          => $this->userId,
                'planName'        => $this->planName,
                'billingCycle'    => $this->billingCycle,
                'isAdminCopy'     => $this->isAdminCopy,
                'accessUntil'     => $this->accessUntil,
                'subscriptionId'  => $this->subscriptionId,
                'paddleCustomerId'=> $this->paddleCustomerId,
            ],
        );
    }
}