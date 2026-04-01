<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PlanUpgraded extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string      $userEmail,
        public string|int  $userId,
        public string      $oldPlan,
        public string      $oldBilling,
        public string      $newPlan,
        public string      $newBilling,
        public string      $effectiveAt,   // "Immediately" or formatted date
        public bool        $isImmediate,
        public bool        $isAdminCopy,
        public ?string     $subscriptionId = null,
        public ?string     $paddleCustomerId = null,
    ) {}

    public function envelope(): Envelope
    {
        $subject = $this->isAdminCopy
            ? '000form Plan Upgraded – ' . $this->userEmail . ' → ' . ucfirst($this->newPlan) . ' (' . ucfirst($this->newBilling) . ')'
            : '000form Your plan has been ' . ($this->isImmediate ? 'upgraded' : 'scheduled for upgrade') . ' – ' . ucfirst($this->newPlan);

        return new Envelope(subject: $subject);
    }

    public function content(): Content
    {
        return new Content(
            view: $this->isAdminCopy
                ? 'emails.plan-upgraded-admin'
                : 'emails.plan-upgraded-user',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}