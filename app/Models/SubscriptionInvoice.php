<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubscriptionInvoice extends Model
{
    protected $fillable = [
        'user_id',
        'subscription_id',
        'paddle_transaction_id',
        'amount_cents',
        'currency',
        'status',
        'paid_at',
        'invoice_url',
    ];

    protected $casts = [
        'user_id' => 'string',
        'paid_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }

    // Returns formatted amount e.g. "$15.00"
    public function formattedAmount(): string
    {
        return '$' . number_format($this->amount_cents / 100, 2);
    }
}