<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title', 'video_url', 'video_thumbnail', 'status'];

    protected $casts = [
        'status' => 'boolean',
    ];
}
