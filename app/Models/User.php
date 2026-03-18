<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Paddle\Billable;
use App\Enums\PlanName;
use App\Enums\SubscriptionStatus;

class User extends Authenticatable
{
    use HasFactory, Billable, HasUuids, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

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
        'paddle_customer_id', // ← ADD THIS
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified' => 'boolean',
        'email_verified_at' => 'datetime',
        'metadata' => 'array',
    ];

    /**
     * Get all forms belonging to the user.
     */
    public function forms()
    {
        return $this->hasMany(Form::class);
    }

    /**
     * Get total submission count across all forms.
     */
    public function getTotalSubmissionsAttribute(): int
    {
        return $this->forms()->sum('submission_count');
    }

    /**
     * Get active forms count.
     */
    public function getActiveFormsCountAttribute(): int
    {
        return $this->forms()->where('status', 'active')->count();
    }

    /**
     * Get the user's initials for avatar fallback.
     */
    public function getInitialsAttribute(): string
    {
        $name = $this->name ?? $this->email;
        $words = explode(' ', $name);
        
        if (count($words) >= 2) {
            return strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
        }
        
        return strtoupper(substr($name, 0, 2));
    }

    public function subscription(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\App\Models\Subscription::class)
                    ->latestOfMany(); // always get the most recent one
    }
 
    // ── CONVENIENCE HELPERS ───────────────────────────────
 
    // Get the subscription only if it's active/accessible
    // Returns null if user has no subscription or it's expired
    // USAGE: if ($user->activeSubscription()) { ... }
    public function activeSubscription(): ?\App\Models\Subscription
    {
        $sub = $this->subscription;
        return ($sub && $sub->canAccess()) ? $sub : null;
    }
 
    // What plan is this user currently on?
    // Returns PlanName enum — defaults to Free if no subscription
    // USAGE: $user->currentPlan()->isAtLeast(PlanName::Professional)
    public function currentPlan(): PlanName
    {
        $sub = $this->activeSubscription();
        if (! $sub) return PlanName::Free;
        return $sub->plan_name;
    }
 
    // Can this user use a specific feature?
    // USAGE: $user->canUseFeature('webhooks')  → true/false
    //        $user->canUseFeature('file_upload_mb')  → true/false
    public function canUseFeature(string $feature): bool
    {
        $val = $this->currentPlan()->limit($feature);
        // false = explicitly disabled for this plan
        // 0 = not allowed (e.g. file_upload_mb = 0)
        return $val !== false && $val !== 0;
    }
 
    // Get a specific limit value for this user's plan
    // USAGE: $user->planLimit('submissions')  → 200
    //        $user->planLimit('team_members') → 2
    public function planLimit(string $feature): mixed
    {
        return $this->currentPlan()->limit($feature);
    }
 
    // Is this user on the free plan (no paid subscription)?
    public function isOnFreePlan(): bool
    {
        return $this->currentPlan() === PlanName::Free;
    }
    
}
