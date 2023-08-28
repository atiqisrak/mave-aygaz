<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BulkGasPage extends Model
{
    public function forms(): MorphMany
    {
        return $this->morphMany(Form::class, 'formable');
    }
    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }


    protected $fillable = [
        'title_en',
        'title_bn',
        'media_id',
        'tabs',
        'title2_en',
        'title2_bn',
        'description_en',
        'description_bn',
        'cards_id',
        'cards2_id',
        'cards3_id',
        'title3_en',
        'title3_bn',
        'cards4_id',
        'status',
    ];


    protected $casts = [
        'section2_cards' => 'json',
        'section3_cards' => 'json',
        'section4_cards' => 'json',
        'section5_cards' => 'json',
    ];
}
