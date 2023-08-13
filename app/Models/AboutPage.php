<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $fillable = [
        'banner', 'description', 'card_id_array', 'title', 'card_id_array_2'
    ];

    protected $casts = [
        'card_id_array' => 'json',
        'card_id_array_2' => 'json',
    ];
}
