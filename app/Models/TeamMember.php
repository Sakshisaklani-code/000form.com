<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamMember extends Model
{
    protected $fillable = [
        'workspace_owner_id',
        'member_user_id',
        'role',
        'joined_at',
    ];

    protected $casts = [
        'joined_at' => 'datetime',
    ];

    // ── Relationships ─────────────────────────────────────────
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'workspace_owner_id');
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(User::class, 'member_user_id');
    }

    // ── Permission helpers ────────────────────────────────────
    public function canView(): bool
    {
        return in_array($this->role, ['viewer', 'editor', 'admin']);
    }

    public function canEdit(): bool
    {
        return in_array($this->role, ['editor', 'admin']);
    }

    public function canAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function roleLabel(): string
    {
        return match($this->role) {
            'viewer' => 'Viewer',
            'editor' => 'Editor',
            'admin'  => 'Admin',
            default  => ucfirst($this->role),
        };
    }
}