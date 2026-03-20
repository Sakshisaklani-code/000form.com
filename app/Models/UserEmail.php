<?php

// app/Models/UserEmail.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class UserEmail extends Model
{
    protected $fillable = [
        'user_id',
        'email',
        'is_verified',
        'verification_token',
        'verification_sent_at',
        'verified_at',
    ];

    protected $casts = [
        'user_id'              => 'string',
        'is_verified'          => 'boolean',
        'verification_sent_at' => 'datetime',
        'verified_at'          => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Generate a fresh verification token
    public static function generateToken(): string
    {
        return Str::random(64);
    }

    // Is the verification token still valid? (expires in 24 hours)
    public function isTokenValid(): bool
    {
        return $this->verification_sent_at?->addHours(24)->isFuture() ?? false;
    }
}