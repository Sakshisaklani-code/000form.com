<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class PaymentSuccessUser extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string  $userEmail,
        public string  $planName,
        public string  $billingCycle,
        public string  $amount,
        public string  $currency,
        public string  $periodEnd,
        public string  $subscriptionId,
        public string  $transactionId,
        public ?string $invoiceUrl = null,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '✅ 000form Payment Successful – Your ' . ucfirst( $this->planName) . ' Plan is Active',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.payment-success-user',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}