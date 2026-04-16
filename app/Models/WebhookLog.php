<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebhookLog extends Model
{
    protected $fillable = [
        'event_id',
        'event_type',
        'payload',
        'received_at',
        'processed_at',
        'status',
        'error_message',
    ];

    protected $casts = [
        'received_at'  => 'datetime',
        'processed_at' => 'datetime',
    ];
}