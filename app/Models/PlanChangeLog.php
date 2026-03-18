<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PlanChangeLog extends Model
{
    protected $fillable = [
        'user_id', 'from_plan', 'to_plan',
        'from_price', 'to_price', 'paddle_event_id', 'changed_at',
    ];
    protected $casts = [
        'user_id'    => 'string',
        'changed_at' => 'datetime',
    ];
}