<?php

// ============================================================
// app/Models/WebhookLog.php
// ============================================================

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebhookLog extends Model
{
    protected $fillable = [
        'event_id',
        'event_type',
        'payload',
        'received_at',
        'processed_at',
        'status',
        'error_message',
    ];

    protected $casts = [
        // DO NOT cast payload to array here
        // We store it as JSON string and decode manually in the job
        // This avoids double-encoding issues
        'received_at'  => 'datetime',
        'processed_at' => 'datetime',
    ];
}


// ============================================================
// Fix in ProcessPaddleWebhook.php handle() method
//
// The payload is stored as a JSON STRING in the DB.
// You must decode it before using it.
// Update the route() call in handle() to decode first:
// ============================================================

// In ProcessPaddleWebhook::handle():
// Change:
//   $this->route($log->event_type, $log->payload);
// To:
//   $payload = is_string($log->payload)
//       ? json_decode($log->payload, true)
//       : $log->payload;
//   $this->route($log->event_type, $payload);


// ============================================================
// ALSO: Process all existing pending webhooks right now
// Run in tinker:
// ============================================================

// $logs = App\Models\WebhookLog::where('status', 'pending')->get();
// foreach($logs as $log) {
//     try {
//         App\Jobs\ProcessPaddleWebhook::dispatchSync($log->id);
//         echo "OK: " . $log->event_type . "\n";
//     } catch(\Exception $e) {
//         echo "FAIL: " . $log->event_type . " — " . $e->getMessage() . "\n";
//     }
// }