<?php
// app/Models/Project.php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'color',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // =========================================================================
    // RELATIONSHIPS
    // =========================================================================

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function forms()
    {
        return $this->hasMany(Form::class);
    }

    // =========================================================================
    // SCOPES
    // =========================================================================

    /**
     * Scope to a specific user's projects.
     */
    public function scopeForUser($query, string $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Only active projects.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Only archived projects.
     */
    public function scopeArchived($query)
    {
        return $query->where('status', 'archived');
    }

    // =========================================================================
    // COMPUTED ATTRIBUTES
    // =========================================================================

    /**
     * Total submissions across all forms in this project.
     */
    public function getTotalSubmissionsAttribute(): int
    {
        return $this->forms->sum('submission_count');
    }

    /**
     * Total unread submissions across all forms in this project.
     */
    public function getTotalUnreadAttribute(): int
    {
        return $this->forms->sum('unread_count');
    }
}