<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerifiedPlaygroundEmail extends Model
{
    protected $fillable = ['email', 'verified_at'];
}
