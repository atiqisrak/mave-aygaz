<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthnSafety extends Model
{
    protected $table = 'healthnsafety_page';
    protected $fillable = [
        'title_en',
        'title_bn',
        'media_id',
        'tabs',
        'description_en',
        'description_bn',
        'title1_en',
        'title1_bn',
        'iconlist',
        'media2_id',
        'title2_en',
        'title2_bn',
        'media3_id',
        'iconlist2',
        'title3_en',
        'title3_bn',
        'cards_id',
        'cards2_id',
        'title4_en',
        'title4_bn',
        'description2_en',
        'description2_bn',
        'iconlist3',
        'status',
    ];
    
}
