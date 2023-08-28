<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'title_en',
        'title_bn',
        'description_bn',
        'description_en',
        'fields',
        'submit_direction',
        'status',
    ];

    public function formable(): MorphTo
    {
        return $this->morphTo();
    }
}
