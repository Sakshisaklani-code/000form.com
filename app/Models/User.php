<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Paddle\Billable;
use Illuminate\Support\Str;
use App\Enums\PlanName;
use App\Models\TeamMember;
use App\Models\TeamInvitation;

class User extends Authenticatable
{
    use HasFactory, Billable, HasUuids, Notifiable, SoftDeletes;

    // ── UUID Fix ───────────────────────────────
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Automatically generate UUIDs for new users
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    // ── Mass assignment ─────────────────────────
    public $rememberTokenName = false;  

    protected $fillable = [
        'id',
        'email',
        'name',
        'avatar_url',
        'provider',
        'email_verified',
        'email_verified_at',
        'metadata',
        'google_id',  
        'avatar',
        'paddle_customer_id',
    ];

    protected $hidden = [];

    protected $casts = [
        'email_verified' => 'boolean',
        'email_verified_at' => 'datetime',
        'metadata' => 'array',
    ];

    // ── Relationships ─────────────────────────
    public function forms()
    {
        return $this->hasMany(Form::class);
    }

    public function subscription(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\App\Models\Subscription::class)
                    ->latestOfMany(); // always get the most recent one
    }

    public function teamMembers()
    {
        return $this->hasMany(TeamMember::class, 'workspace_owner_id', 'id');
    }

    public function memberOf()
    {
        return $this->hasMany(TeamMember::class, 'member_user_id', 'id');
    }

    public function sentInvitations()
    {
        return $this->hasMany(TeamInvitation::class, 'workspace_owner_id', 'id');
    }

    public function pendingInvitations()
    {
        return TeamInvitation::where('invitee_email', $this->email)
            ->where('status', 'pending')
            ->where('expires_at', '>', now())
            ->get();
    }

    // ── Helper Methods ─────────────────────────
    public function getTotalSubmissionsAttribute(): int
    {
        return $this->forms()->sum('submission_count');
    }

    public function getActiveFormsCountAttribute(): int
    {
        return $this->forms()->where('status', 'active')->count();
    }

    public function getInitialsAttribute(): string
    {
        $name = $this->name ?? $this->email;
        $words = explode(' ', $name);
        if (count($words) >= 2) {
            return strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
        }
        return strtoupper(substr($name, 0, 2));
    }

    // ── Subscription Helpers ───────────────────
    public function activeSubscription(): ?\App\Models\Subscription
    {
        $sub = $this->subscription;
        return ($sub && $sub->canAccess()) ? $sub : null;
    }

    public function currentPlan(): PlanName
    {
        $sub = $this->activeSubscription();
        if (! $sub) return PlanName::Free;
        return $sub->plan_name;
    }

    public function canUseFeature(string $feature): bool
    {
        $val = $this->currentPlan()->limit($feature);
        return $val !== false && $val !== 0;
    }

    public function planLimit(string $feature): mixed
    {
        return $this->currentPlan()->limit($feature);
    }

    public function isOnFreePlan(): bool
    {
        return $this->currentPlan() === PlanName::Free;
    }

    // ── Team Helpers ───────────────────────────
    public function teamMembersLimit(): int
    {
        $plan = $this->currentPlan()->value ?? 'free';
        return config("plans.{$plan}.team_members", 1);
    }

    public function currentTeamMembersCount(): int
    {
        return $this->teamMembers()->count() + 1; // +1 for owner
    }

    public function canAddTeamMember(): bool
    {
        $limit = $this->teamMembersLimit();
        if ($limit === -1) return true; // unlimited
        return $this->currentTeamMembersCount() < $limit;
    }

    public function isTeamMemberOf(string $ownerId): bool
    {
        return $this->memberOf()->where('workspace_owner_id', $ownerId)->exists();
    }

    public function teamMemberRecord(string $ownerId): ?TeamMember
    {
        return $this->memberOf()->where('workspace_owner_id', $ownerId)->first();
    }

    public function activeWorkspaceOwnerId(): string
    {
        return session('active_workspace', $this->id);
    }

    public function isInOwnWorkspace(): bool
    {
        return $this->activeWorkspaceOwnerId() === $this->id;
    }
}