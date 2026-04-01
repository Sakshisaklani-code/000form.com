<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentSuccessAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string  $userEmail,
        public string|int $userId,
        public string  $planName,
        public string  $billingCycle,
        public string  $amount,
        public string  $currency,
        public string  $periodEnd,
        public string  $subscriptionId,
        public string  $transactionId,
        public ?string $invoiceUrl = null,
        public ?string $paddleCustomerId = null,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '💳 000form New Payment – ' . $this->userEmail . ' subscribed to ' . ucfirst($this->planName),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.payment-success-admin',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}