<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class AboutPage extends Model
{
    protected $table = 'aboutpages';

    protected $fillable = [
        'media_id', 'description_en', 'description_bn', 'section3_cards', 'section4_cards'
    ];

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }
    public function section3_cards(): MorphToMany
{
    return $this->morphToMany(Card::class, 'cardable');
}

public function section4_cards(): MorphToMany
{
    return $this->morphToMany(Card::class, 'cardable');
}
}
