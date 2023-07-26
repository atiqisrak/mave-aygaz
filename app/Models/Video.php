<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title', 'description', 'video_url'];

    protected $casts = [
        'title' => 'json',
        'description' => 'json',
    ];
}
