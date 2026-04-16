<?php

// ============================================================
// COMPLETE SUBMISSION LIMIT ENFORCEMENT
// 3 files to create/update:
//
//  1. app/Http/Middleware/CheckSubmissionLimit.php  ← NEW
//  2. app/Services/SubmissionGateService.php        ← NEW
//  3. Register middleware in bootstrap/app.php
//     OR app/Http/Kernel.php
//  4. Apply to your form submission route
// ============================================================


// ============================================================
// FILE 1: app/Http/Middleware/CheckSubmissionLimit.php
//
// Runs on every incoming form submission request.
// Checks the form OWNER's subscription limits — not the submitter.
// The person filling out the form doesn't need a subscription.
// The person who CREATED the form does.
// ============================================================

namespace App\Http\Middleware;

use App\Models\Subscription;
use App\Enums\SubscriptionStatus;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CheckSubmissionLimit
{
    public function handle(Request $request, Closure $next): mixed
    {
        // Get the form from the route — assumes route has {form} parameter
        // e.g. Route::post('/f/{form}', ...) or Route::post('/forms/{form}/submit', ...)
        $form = $request->route('form');

        if (! $form) {
            return $next($request); // no form in route, skip check
        }

        // Get the form owner's user_id
        // Adjust 'user_id' to match your forms table column name
        $ownerId = $form->user_id;

        // ── LOAD SUBSCRIPTION (cached for 5 minutes) ──────────
        // Caching avoids a DB hit on every single form submission
        // Cache is cleared when subscription changes (in webhook job)
        $subscription = Cache::remember(
            "sub_limit_{$ownerId}",
            300, // 5 minutes
            fn() => Subscription::where('user_id', $ownerId)->first()
        );

        // ── NO SUBSCRIPTION → FREE PLAN LIMITS ────────────────
        if (! $subscription) {
            return $this->checkFreeLimit($ownerId, $request, $next);
        }

        // ── SUBSCRIPTION EXISTS — check status ────────────────

        // Expired or paused — block all submissions
        if (! $subscription->canAccess()) {
            return $this->blockSubmission(
                'This form is currently unavailable.',
                'subscription_inactive'
            );
        }

        // ── CHECK SUBMISSION LIMIT ─────────────────────────────
        if ($subscription->hasReachedLimit()) {
            return $this->blockSubmission(
                'This form is temporarily unavailable. The owner has reached their submission limit.',
                'submission_limit_reached',
                [
                    'limit' => $subscription->submissions_limit,
                    'used'  => $subscription->submissions_used,
                ]
            );
        }

        // ── ALLOW — increment counter atomically ──────────────
        // Using DB increment to prevent race conditions when multiple
        // submissions arrive at exactly the same time
        Subscription::where('id', $subscription->id)
                    ->increment('submissions_used');

        // Clear cache near limit so next check gets fresh count
        if ($subscription->submissionsUsedPercent() >= 79) {
            Cache::forget("sub_limit_{$ownerId}");
        }

        // Add header so API users can track their remaining submissions
        $response = $next($request);
        $remaining = $subscription->submissions_limit === -1
            ? 'unlimited'
            : max(0, $subscription->submissions_limit - ($subscription->submissions_used + 1));

        $response->headers->set('X-Submissions-Remaining', $remaining);
        $response->headers->set('X-Submissions-Limit', $subscription->submissions_limit === -1 ? 'unlimited' : $subscription->submissions_limit);

        return $response;
    }

    // ── FREE PLAN: 50 submissions/month ───────────────────────
    // Tracked in cache since free users have no subscription record
    private function checkFreeLimit(string $ownerId, Request $request, Closure $next): mixed
    {
        $cacheKey = "free_sub_{$ownerId}_" . now()->format('Y_m');
        $count    = Cache::get($cacheKey, 0);

        if ($count >= 50) {
            return $this->blockSubmission(
                'This form is temporarily unavailable. The owner has reached their free plan limit.',
                'submission_limit_reached',
                ['limit' => 50, 'used' => $count]
            );
        }

        // Increment free plan counter — expires at end of month
        Cache::put($cacheKey, $count + 1, now()->endOfMonth());

        return $next($request);
    }

    // ── BLOCK HELPER ──────────────────────────────────────────
    private function blockSubmission(string $message, string $code, array $extra = []): \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
    {
        // Return JSON for API/AJAX requests
        if (request()->expectsJson() || request()->isJson()) {
            return response()->json(array_merge([
                'error'   => $code,
                'message' => $message,
            ], $extra), 402);
        }

        // Return redirect with error for regular form posts
        return redirect()->back()->with('error', $message);
    }
}


// ============================================================
// FILE 2: app/Services/SubmissionGateService.php
//
// Reusable service for checking submission limits anywhere
// in your app — controllers, commands, jobs, etc.
// Usage: SubmissionGateService::canSubmit($form)
// ============================================================

namespace App\Services;

use App\Models\Subscription;
use Illuminate\Support\Facades\Cache;

class SubmissionGateService
{
    // Check if a form owner can receive a new submission
    // Returns true if allowed, false if blocked
    public static function canSubmit($form): bool
    {
        $ownerId     = $form->user_id;
        $subscription = Cache::remember(
            "sub_limit_{$ownerId}",
            300,
            fn() => Subscription::where('user_id', $ownerId)->first()
        );

        if (! $subscription) {
            // Free plan — check cache counter
            $count = Cache::get("free_sub_{$ownerId}_" . now()->format('Y_m'), 0);
            return $count < 50;
        }

        return $subscription->canAccess() && ! $subscription->hasReachedLimit();
    }

    // Get remaining submissions for a form owner
    // Returns -1 for unlimited, 0 if at limit
    public static function remaining($form): int
    {
        $ownerId      = $form->user_id;
        $subscription = Subscription::where('user_id', $ownerId)->first();

        if (! $subscription) {
            $used = Cache::get("free_sub_{$ownerId}_" . now()->format('Y_m'), 0);
            return max(0, 50 - $used);
        }

        if ($subscription->submissions_limit === -1) return -1;
        return max(0, $subscription->submissions_limit - $subscription->submissions_used);
    }

    // Clear the cached subscription for a user
    // Call this from your webhook job after updating the subscription
    public static function clearCache(string $userId): void
    {
        Cache::forget("sub_limit_{$userId}");
    }
}

