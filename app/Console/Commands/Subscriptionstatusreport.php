<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use App\Enums\SubscriptionStatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SubscriptionStatusReport extends Command
{
    protected $signature   = 'subscriptions:report';
    protected $description = 'Fetch and display all subscription statuses (runs daily)';

    public function handle(): int
    {
        $this->info('📊 Subscription Status Report — ' . now()->toDateTimeString());
        $this->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');

        // ── Summary counts by status ─────────────────────────────────────
        $counts = Subscription::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        $this->info("\n📈 Summary:");
        $this->table(
            ['Status', 'Count'],
            [
                ['✅ Active',    $counts['active']    ?? 0],
                ['🟡 Past Due',  $counts['past_due']  ?? 0],
                ['💀 Expired',   $counts['expired']   ?? 0],
                ['❌ Cancelled', $counts['cancelled'] ?? 0],
                ['⏸  Paused',   $counts['paused']    ?? 0],
                ['🔄 Trialing',  $counts['trialing']  ?? 0],
                ['─────────',   '─────'],
                ['TOTAL',        Subscription::count()],
            ]
        );

        // ── Active subscriptions ─────────────────────────────────────────
        $this->info("\n✅ ACTIVE Subscriptions:");
        $active = Subscription::where('status', SubscriptionStatus::Active)
            ->select('id', 'user_id', 'plan_name', 'billing_cycle', 'next_billing_date', 'current_period_end')
            ->get();

        if ($active->isEmpty()) {
            $this->line('   None');
        } else {
            $this->table(
                ['ID', 'User ID', 'Plan', 'Cycle', 'Next Billing', 'Period Ends'],
                $active->map(fn($s) => [
                    $s->id,
                    substr($s->user_id, 0, 8) . '...',
                    $s->plan_name instanceof \BackedEnum ? $s->plan_name->value : $s->plan_name,
                    $s->billing_cycle instanceof \BackedEnum ? $s->billing_cycle->value : $s->billing_cycle,
                    $s->next_billing_date ?? 'N/A',
                    $s->current_period_end ?? 'N/A',
                ])->toArray()
            );
        }

        // ── Past due subscriptions ───────────────────────────────────────
        $this->info("\n🟡 PAST DUE Subscriptions:");
        $pastDue = Subscription::where('status', SubscriptionStatus::PastDue)
            ->select('id', 'user_id', 'plan_name', 'grace_period_ends_at', 'last_payment_at')
            ->get();

        if ($pastDue->isEmpty()) {
            $this->line('   None');
        } else {
            $this->table(
                ['ID', 'User ID', 'Plan', 'Grace Ends At', 'Access', 'Last Payment'],
                $pastDue->map(fn($s) => [
                    $s->id,
                    substr($s->user_id, 0, 8) . '...',
                    $s->plan_name instanceof \BackedEnum ? $s->plan_name->value : $s->plan_name,
                    $s->grace_period_ends_at ?? 'N/A',
                    $s->grace_period_ends_at && now()->gt($s->grace_period_ends_at)
                        ? '⛔ Blocked'
                        : '🟡 Allowed',
                    $s->last_payment_at ?? 'N/A',
                ])->toArray()
            );
        }

        // ── Expired subscriptions ────────────────────────────────────────
        $this->info("\n💀 EXPIRED Subscriptions:");
        $expired = Subscription::where('status', SubscriptionStatus::Expired)
            ->select('id', 'user_id', 'plan_name', 'billing_cycle', 'cancelled_at')
            ->get();

        if ($expired->isEmpty()) {
            $this->line('   None');
        } else {
            $this->table(
                ['ID', 'User ID', 'Plan', 'Cycle', 'Expired At'],
                $expired->map(fn($s) => [
                    $s->id,
                    substr($s->user_id, 0, 8) . '...',
                    $s->plan_name instanceof \BackedEnum ? $s->plan_name->value : $s->plan_name,
                    $s->billing_cycle instanceof \BackedEnum ? $s->billing_cycle->value : $s->billing_cycle,
                    $s->cancelled_at ?? 'N/A',
                ])->toArray()
            );
        }

        // ── Cancelled subscriptions ──────────────────────────────────────
        $this->info("\n❌ CANCELLED Subscriptions:");
        $cancelled = Subscription::where('status', SubscriptionStatus::Cancelled)
            ->select('id', 'user_id', 'plan_name', 'billing_cycle', 'cancelled_at', 'cancel_at_period_end')
            ->get();

        if ($cancelled->isEmpty()) {
            $this->line('   None');
        } else {
            $this->table(
                ['ID', 'User ID', 'Plan', 'Cycle', 'Cancelled At', 'End of Period'],
                $cancelled->map(fn($s) => [
                    $s->id,
                    substr($s->user_id, 0, 8) . '...',
                    $s->plan_name instanceof \BackedEnum ? $s->plan_name->value : $s->plan_name,
                    $s->billing_cycle instanceof \BackedEnum ? $s->billing_cycle->value : $s->billing_cycle,
                    $s->cancelled_at ?? 'N/A',
                    $s->cancel_at_period_end ? 'Yes' : 'No',
                ])->toArray()
            );
        }

        // ── Paused subscriptions ─────────────────────────────────────────
        $this->info("\n⏸  PAUSED Subscriptions:");
        $paused = Subscription::where('status', SubscriptionStatus::Paused)
            ->select('id', 'user_id', 'plan_name', 'billing_cycle', 'paused_at')
            ->get();

        if ($paused->isEmpty()) {
            $this->line('   None');
        } else {
            $this->table(
                ['ID', 'User ID', 'Plan', 'Cycle', 'Paused At'],
                $paused->map(fn($s) => [
                    $s->id,
                    substr($s->user_id, 0, 8) . '...',
                    $s->plan_name instanceof \BackedEnum ? $s->plan_name->value : $s->plan_name,
                    $s->billing_cycle instanceof \BackedEnum ? $s->billing_cycle->value : $s->billing_cycle,
                    $s->paused_at ?? 'N/A',
                ])->toArray()
            );
        }

        // ── Renewals due in next 7 days ──────────────────────────────────
        $this->info("\n🔔 Renewals Due in Next 7 Days:");
        $upcoming = Subscription::where('status', SubscriptionStatus::Active)
            ->whereBetween('next_billing_date', [now(), now()->addDays(7)])
            ->select('id', 'user_id', 'plan_name', 'billing_cycle', 'next_billing_date')
            ->orderBy('next_billing_date')
            ->get();

        if ($upcoming->isEmpty()) {
            $this->line('   None');
        } else {
            $this->table(
                ['ID', 'User ID', 'Plan', 'Cycle', 'Renews At', 'Days Left'],
                $upcoming->map(fn($s) => [
                    $s->id,
                    substr($s->user_id, 0, 8) . '...',
                    $s->plan_name instanceof \BackedEnum ? $s->plan_name->value : $s->plan_name,
                    $s->billing_cycle instanceof \BackedEnum ? $s->billing_cycle->value : $s->billing_cycle,
                    $s->next_billing_date,
                    now()->diffInDays($s->next_billing_date) . ' days',
                ])->toArray()
            );
        }

        $this->info("\n━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━");
        $this->info('✅ Report complete.');

        return Command::SUCCESS;
    }
}