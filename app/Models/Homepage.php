<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Homepage extends Model
{
    protected $fillable = [
        'navbar_id',
        'slider_id',
        'card_id',
        'cards_id',
        'media_id',
        'media_ids',
        'footer_id',
    ];

    // Define relationships to other tables
    public function navbar()
    {
        return $this->belongsTo(Navbar::class);
    }

    public function slider()
    {
        return $this->belongsTo(Slider::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    // public function cards()
    // {
    //     return $this->hasMany(Card::class);
    // }
    public function cards(): MorphToMany
    {
        return $this->morphToMany(Card::class, 'cardable');
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    public function footer()
    {
        return $this->belongsTo(Footer::class);
    }
}
