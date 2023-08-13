<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'title',
        'description',
        'options',
        'fields',
        'submit_direction',
    ];

    protected $casts = [
        'options' => 'json',
        'fields' => 'json',
    ];
}
