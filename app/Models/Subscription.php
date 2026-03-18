<?php

// app/Models/Subscription.php
//
// This model wraps your subscriptions table.
// It provides:
//   - Cast definitions so status/plan come back as Enums automatically
//   - Relationship back to the User
//   - Helper methods used throughout controllers and Blade views
//     so you never repeat the same conditional logic
//
// USAGE EXAMPLES (in controllers or Blade):
//   $sub->isActive()                → true/false
//   $sub->onGracePeriod()           → true/false (cancelled but period not ended)
//   $sub->submissionsRemaining()    → int or -1 (unlimited)
//   $sub->statusBadgeColor()        → CSS class string

namespace App\Models;

use App\Enums\PlanName;
use App\Enums\SubscriptionStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Subscription extends Model
{
    protected $fillable = [
        'user_id',
        'paddle_subscription_id',
        'paddle_customer_id',
        'paddle_price_id',
        'plan_name',
        'billing_cycle',
        'status',
        'submissions_limit',
        'submissions_used',
        'file_upload_limit_mb',
        'team_members_limit',
        'webhooks_enabled',
        'role_permissions_enabled',
        'current_period_start',
        'current_period_end',
        'next_billing_date',
        'cancel_at_period_end',
        'cancelled_at',
        'grace_period_ends_at',
        'trial_ends_at',
        'paused_at',
        'last_payment_at',
        'paddle_last_event',
    ];

    // ── CASTS ─────────────────────────────────────────────
    // Laravel automatically converts DB strings to the correct PHP type
    // So $sub->status returns a SubscriptionStatus enum, not a raw string
    protected $casts = [
        'status'                    => SubscriptionStatus::class,
        'plan_name'                 => PlanName::class,
        'webhooks_enabled'          => 'boolean',
        'role_permissions_enabled'  => 'boolean',
        'cancel_at_period_end'      => 'boolean',
        'current_period_start'      => 'datetime',
        'current_period_end'        => 'datetime',
        'next_billing_date'         => 'datetime',
        'cancelled_at'              => 'datetime',
        'grace_period_ends_at'      => 'datetime',
        'trial_ends_at'             => 'datetime',
        'paused_at'                 => 'datetime',
        'last_payment_at'           => 'datetime',
    ];

    // ── RELATIONSHIP ──────────────────────────────────────
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // ══════════════════════════════════════════════════════
    // STATUS HELPER METHODS
    // Used in Blade views and controllers to show/hide UI elements
    // ══════════════════════════════════════════════════════

    // Is the subscription in a fully active, paid state?
    public function isActive(): bool
    {
        return $this->status === SubscriptionStatus::Active;
    }

    // Is the user on a free trial?
    public function isTrialing(): bool
    {
        return $this->status === SubscriptionStatus::Trialing
            && $this->trial_ends_at?->isFuture();
    }

    // Has the user cancelled but their paid period hasn't ended yet?
    // → Show orange banner: "Cancels on [date]"
    // → Still show full plan access
    public function onGracePeriod(): bool
    {
        return $this->cancel_at_period_end
            && $this->current_period_end?->isFuture();
    }

    // Has payment failed but we're within the grace window?
    // → Show red "Payment Failed" banner
    // → Still allow submissions until grace_period_ends_at
    public function onPaymentGracePeriod(): bool
    {
        return $this->status === SubscriptionStatus::PastDue
            && $this->grace_period_ends_at?->isFuture();
    }

    // Should we actually allow form submissions right now?
    // This is the core access check used in middleware
    public function canAccess(): bool
    {
        return match($this->status) {
            SubscriptionStatus::Active    => true,
            SubscriptionStatus::Trialing  => $this->trial_ends_at?->isFuture() ?? false,
            SubscriptionStatus::Cancelled => $this->current_period_end?->isFuture() ?? false,
            SubscriptionStatus::PastDue   => $this->grace_period_ends_at?->isFuture() ?? false,
            default                       => false,
        };
    }

    // ══════════════════════════════════════════════════════
    // SUBMISSION LIMIT HELPERS
    // ══════════════════════════════════════════════════════

    // How many submissions are left this billing period?
    // Returns -1 if unlimited (business plan)
    public function submissionsRemaining(): int
    {
        if ($this->submissions_limit === -1) {
            return -1; // unlimited
        }
        return max(0, $this->submissions_limit - $this->submissions_used);
    }

    // Percentage of submission quota used — for the progress bar
    // Returns 0–100
    public function submissionsUsedPercent(): int
    {
        if ($this->submissions_limit === -1) {
            return 0; // unlimited, progress bar stays empty
        }
        if ($this->submissions_limit === 0) {
            return 100;
        }
        return (int) min(100, ($this->submissions_used / $this->submissions_limit) * 100);
    }

    // Has the user hit 80%+ usage? → triggers warning email
    public function isApproachingLimit(): bool
    {
        return $this->submissionsUsedPercent() >= 80
            && $this->submissions_limit !== -1;
    }

    // Has the user hit 100%? → block new submissions
    public function hasReachedLimit(): bool
    {
        if ($this->submissions_limit === -1) {
            return false;
        }
        return $this->submissions_used >= $this->submissions_limit;
    }

    // ══════════════════════════════════════════════════════
    // UI DISPLAY HELPERS
    // ══════════════════════════════════════════════════════

    // Human-readable status label for the badge
    public function statusLabel(): string
    {
        if ($this->onGracePeriod()) {
            return 'Cancels ' . $this->current_period_end->format('M d, Y');
        }
        if ($this->onPaymentGracePeriod()) {
            return 'Payment Failed — access until ' . $this->grace_period_ends_at->format('M d, Y');
        }
        return $this->status->label();
    }

    // CSS class for the status badge
    public function statusBadgeColor(): string
    {
        if ($this->onGracePeriod()) return 'badge-warning';
        if ($this->onPaymentGracePeriod()) return 'badge-danger';
        return $this->status->color();
    }

    // Formatted next billing date or human message
    public function nextBillingLabel(): string
    {
        if ($this->cancel_at_period_end) {
            return 'No further charges — cancels ' . $this->current_period_end?->format('M d, Y');
        }
        if ($this->next_billing_date) {
            return $this->next_billing_date->format('M d, Y');
        }
        return 'N/A';
    }
}