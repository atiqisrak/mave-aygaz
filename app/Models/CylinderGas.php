<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;


class CylinderGas extends Model
{
    protected $table = 'cylinder_gas';
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
    'form_ids',
    'title4_en',
    'title4_bn',
    'description_en',
    'description_bn',
    'title5_en',
    'title5_bn',
    'advantages',
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

    // public function form(): MorphOne
    // {
    //     return $this->morphOne(Form::class, 'formable');
    // }

    public function forms(): MorphMany
    {
        return $this->morphMany(Form::class, 'formable');
    }
}
