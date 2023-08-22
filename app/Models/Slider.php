<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_bn',
        'media_ids',
        'status'
    ];
    public function media()
    {
        return $this->morphToMany(Media::class, 'entity', 'medex');
    }
    protected $casts = [
        'media_ids' => 'array'
    ];
}
