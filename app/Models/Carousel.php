<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = [
        'image',
        'title',
        'description',
        'slug',
        'status',
    ];
    protected $casts = [
        'title' => 'json',
        'description' => 'json',
    ];
}
