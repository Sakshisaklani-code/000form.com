<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlaygroundFormSubmission extends Model
{
    protected $fillable = [
        'recipient_email',
        'sender_email',
        'name',
        'fields',
        'special_fields',
        'attachments',
        'ip',
        'user_agent',
        'referrer',
    ];

    protected $casts = [
        'fields' => 'array',
        'special_fields' => 'array',
        'attachments' => 'array',
    ];
}