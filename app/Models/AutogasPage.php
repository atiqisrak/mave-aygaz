<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutogasPage extends Model
{
    protected $fillable = [
        'title_en',
        'title_bn',
        'media_id',
        'title2_en',
        'title2_bn',
        'description_en',
        'description_bn',
        'title3_en',
        'title3_bn',
        'cards_id',
        'title4_en',
        'title4_bn',
        'cards2_id',
        'title5_en',
        'title5_bn',
        'cards3_id',
        'status',
    ];

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function cards(): MorphToMany
    {
        return $this->morphToMany(Card::class, 'cardable');
    }

    public function cards2(): MorphToMany
    {
        return $this->morphToMany(Card::class, 'cardable');
    }

    public function cards3(): MorphToMany
    {
        return $this->morphToMany(Card::class, 'cardable');
    }
    
}
