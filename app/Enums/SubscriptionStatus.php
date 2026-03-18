<?php

// app/Enums/SubscriptionStatus.php
//
// WHY ENUMS?
//   Instead of using raw strings like 'active', 'past_due' everywhere
//   in your code, PHP enums give you:
//   - Autocomplete in your IDE
//   - A typo will cause a compile error, not a silent bug
//   - One place to see all possible states
//   - Helper methods like ->label() and ->color() used in Blade views
//
// USAGE EXAMPLES:
//   $sub->status === SubscriptionStatus::Active->value   ← checking
//   SubscriptionStatus::from('past_due')                 ← from DB string
//   $sub->status->label()                                ← in Blade views

namespace App\Enums;

enum SubscriptionStatus: string
{
    case Active    = 'active';
    case Cancelled = 'cancelled';
    case PastDue   = 'past_due';
    case Paused    = 'paused';
    case Trialing  = 'trialing';
    case Expired   = 'expired';

    // ── Human-readable label shown in the UI ──────────────
    public function label(): string
    {
        return match($this) {
            self::Active    => 'Active',
            self::Cancelled => 'Cancelled',
            self::PastDue   => 'Payment Failed',
            self::Paused    => 'Paused',
            self::Trialing  => 'Trial',
            self::Expired   => 'Expired',
        };
    }

    // ── CSS color class for the badge in Blade views ──────
    // Used as: <span class="badge {{ $sub->status->color() }}">
    public function color(): string
    {
        return match($this) {
            self::Active    => 'badge-success',   // green
            self::Cancelled => 'badge-warning',   // orange
            self::PastDue   => 'badge-danger',    // red
            self::Paused    => 'badge-purple',    // purple
            self::Trialing  => 'badge-blue',      // blue
            self::Expired   => 'badge-gray',      // gray
        };
    }

    // ── Can this user still access the product? ───────────
    // Used in submission gating middleware
    public function hasAccess(): bool
    {
        return in_array($this, [
            self::Active,
            self::Trialing,
            self::Cancelled,  // still has access until period ends
            self::PastDue,    // still has access during grace period
        ]);
    }

    // ── Should we show an upgrade/reactivate prompt? ──────
    public function needsAttention(): bool
    {
        return in_array($this, [
            self::PastDue,
            self::Expired,
            self::Paused,
        ]);
    }
}