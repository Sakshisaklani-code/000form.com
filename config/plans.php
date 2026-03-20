<?php

// config/plans.php
//
// This is the SINGLE SOURCE OF TRUTH for:
//   1. Paddle Price IDs (from your Paddle dashboard)
//   2. Per-plan feature limits used everywhere in the app
//
// HOW IT WORKS:
//   - Price IDs come from .env so they can differ between sandbox and production
//   - Limits are hardcoded here — they don't change per environment
//   - -1 means "unlimited" throughout the app
//   - Any middleware, service, or controller reads limits from here
//     so if you change a plan limit, you only change it in ONE place

return [

    // ──────────────────────────────────────────────────────
    // FREE — no Paddle product needed, default for all users
    // ──────────────────────────────────────────────────────
    'free' => [
        'price_monthly'         => 0,
        'price_annual'          => 0,
        'paddle_monthly_id'     => null,   // no Paddle product
        'paddle_annual_id'      => null,
        'submissions'           => 50,     // 50 per month
        'forms'                 => 3,      // max 3 forms
        'team_members'          => 1,      // only owner
        'file_upload_mb'        => 10,      // no file uploads
        'webhooks'              => false,
        'role_permissions'      => false,
        'email_notifications'   => false,
        'csv_export'            => false,
        'label'                 => 'Free',
        'description'           => 'For testing and development.',
    ],

    // ──────────────────────────────────────────────────────
    // PERSONAL — $15/mo
    // ──────────────────────────────────────────────────────
    'personal' => [
        'price_monthly'         => 15,
        'price_annual'          => 144,    // $12/mo billed annually = 20% off
        'paddle_monthly_id'     => env('PADDLE_PERSONAL_MONTHLY_PRICE_ID'),
        'paddle_annual_id'      => env('PADDLE_PERSONAL_ANNUAL_PRICE_ID'),
        'submissions'           => 200,
        'forms'                 => -1,     // unlimited
        'team_members'          => 2,
        'file_upload_mb'        => 10,      // 10MB file uploads
        'webhooks'              => false,
        'role_permissions'      => false,
        'email_notifications'   => true,   // ✓ unlocked
        'csv_export'            => true,   // ✓ unlocked
        'label'                 => 'Personal',
        'description'           => 'For personal or portfolio sites.',
    ],

    // ──────────────────────────────────────────────────────
    // PROFESSIONAL — $30/mo
    // ──────────────────────────────────────────────────────
    'professional' => [
        'price_monthly'         => 30,
        'price_annual'          => 288,    // $24/mo billed annually = 20% off
        'paddle_monthly_id'     => env('PADDLE_PRO_MONTHLY_PRICE_ID'),
        'paddle_annual_id'      => env('PADDLE_PRO_ANNUAL_PRICE_ID'),
        'submissions'           => 2000,
        'forms'                 => -1,
        'team_members'          => 3,
        'file_upload_mb'        => 10,     // ✓ 10MB uploads
        'webhooks'              => true,   // ✓ unlocked
        'role_permissions'      => false,
        'email_notifications'   => true,
        'csv_export'            => true,
        'label'                 => 'Professional',
        'description'           => 'For freelancers and startups.',
    ],

    // ──────────────────────────────────────────────────────
    // BUSINESS — $90/mo
    // ──────────────────────────────────────────────────────
    'business' => [
        'price_monthly'         => 90,
        'price_annual'          => 864,    // $72/mo billed annually = 20% off
        'paddle_monthly_id'     => env('PADDLE_BUSINESS_MONTHLY_PRICE_ID'),
        'paddle_annual_id'      => env('PADDLE_BUSINESS_ANNUAL_PRICE_ID'),
        'submissions'           => 20000,     // unlimited
        'forms'                 => -1,
        'team_members'          => -1,    // unlimited
        'file_upload_mb'        => 10,    // ✓ 100MB uploads
        'webhooks'              => true,
        'role_permissions'      => true,   // ✓ unlocked
        'email_notifications'   => true,
        'csv_export'            => true,
        'label'                 => 'Business',
        'description'           => 'For organizations and agencies.',
    ],

];