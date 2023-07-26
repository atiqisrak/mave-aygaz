<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageLibrary extends Model
{
    protected $fillable = ['title', 'image'];

    protected $casts = [
        'title' => 'json',
    ];
}
