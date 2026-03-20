<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamInvitation extends Model
{
    protected $fillable = [
        'workspace_owner_id',
        'invitee_email',
        'invitee_user_id',
        'role',
        'token',
        'status',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    // ── Relationships ─────────────────────────────────────────
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'workspace_owner_id');
    }

    public function invitee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'invitee_user_id');
    }

    // ── Helpers ───────────────────────────────────────────────
    public function isPending(): bool
    {
        return $this->status === 'pending' && $this->expires_at->isFuture();
    }

    public function isExpired(): bool
    {
        return $this->status === 'pending' && $this->expires_at->isPast();
    }

    public function isAccepted(): bool
    {
        return $this->status === 'accepted';
    }

    public function acceptUrl(): string
    {
        return route('team.accept', $this->token);
    }
}