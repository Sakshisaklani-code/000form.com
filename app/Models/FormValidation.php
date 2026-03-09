<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormValidation extends Model
{
    protected $table = 'form_validations';

    protected $fillable = [
        'form_id',
        'field_name',
        'field_type',
        'rule',
        'is_required',
        'min_length',
        'max_length',
    ];

    protected $casts = [
        'is_required' => 'boolean',
        'min_length'  => 'integer',
        'max_length'  => 'integer',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}