<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $fillable = ['title', 'description', 'cta_button_text', 'cta_button_url', 'image'];

    protected $casts = [
        'title' => 'json',
        'description' => 'json',
        'cta_button_text' => 'json',
        'cta_button_url' => 'json',
    ];
}
