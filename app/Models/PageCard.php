<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageCard extends Model
{
    protected $fillable = ['image', 'title', 'description', 'link_url'];

    protected $casts = [
        'title' => 'json',
        'description' => 'json',
    ];
}
