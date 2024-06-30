<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormEntry extends Model
{
    protected $fillable = ['form_id', 'data'];

    protected $casts = [
        'data' => 'array',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
