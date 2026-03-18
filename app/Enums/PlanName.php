<?php

// app/Enums/PlanName.php
//
// Represents the name of the plan a user is on.
// Every place in the app that needs to know "which plan is this user on?"
// uses this enum — no raw strings.
//
// USAGE EXAMPLES:
//   $user->subscription->plan_name === PlanName::Professional->value
//   PlanName::from('business')->limits()      ← get limits array from config
//   PlanName::Professional->isAtLeast(PlanName::Personal)  ← for gate checks

namespace App\Enums;

enum PlanName: string
{
    case Free         = 'free';
    case Personal     = 'personal';
    case Professional = 'professional';
    case Business     = 'business';

    // ── Get this plan's limits from config/plans.php ──────
    // Example: PlanName::Professional->limits()['submissions'] → 2000
    public function limits(): array
    {
        return config("plans.{$this->value}");
    }

    // ── Get a specific limit value ────────────────────────
    // Example: PlanName::Business->limit('file_upload_mb') → 100
    public function limit(string $key): mixed
    {
        return config("plans.{$this->value}.{$key}");
    }

    // ── Numeric rank for comparison ───────────────────────
    // Used to check "is this plan at least Professional?"
    // Example: PlanName::Business->rank() > PlanName::Personal->rank()
    public function rank(): int
    {
        return match($this) {
            self::Free         => 0,
            self::Personal     => 1,
            self::Professional => 2,
            self::Business     => 3,
        };
    }

    // ── Is this plan equal to or higher than $other? ─────
    // Example: PlanName::from($user->plan)->isAtLeast(PlanName::Professional)
    // Used in gates: "user must be on Professional or higher"
    public function isAtLeast(PlanName $other): bool
    {
        return $this->rank() >= $other->rank();
    }

    // ── Human-readable label ──────────────────────────────
    public function label(): string
    {
        return config("plans.{$this->value}.label", ucfirst($this->value));
    }
}