<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutCylinderGas extends Model
{
    protected $table = 'about_cylinder_gas';
    protected $fillable = [
        'title_en',
        'title_bn',
        'media_id',
        'tabs',
        'card_id',
        'media2_id',
        'card2_id',
        'title2_en',
        'title2_bn',
        'subtitle_en',
        'subtitle_bn',
        'cards_id',
        'title3_en',
        'title3_bn',
        'subtitle2_en',
        'subtitle2_bn',
        'cards2_id',
        'status',
    ];

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function media2()
    {
        return $this->belongsTo(Media::class, 'media2_id');
    }

    public function cards(): MorphToMany
    {
        return $this->morphToMany(Card::class, 'cardable');
    }

    public function card2()
    {
        return $this->belongsTo(Card::class, 'card2_id');
    }

    public function cards2(): MorphToMany
    {
        return $this->morphToMany(Card::class, 'cardable');
    }
}
