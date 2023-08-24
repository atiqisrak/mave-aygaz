<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = [
        'title_en',
        'title_bn',
        'footer_status',
        'logo_id',
        'address1_title_en',
        'address1_title_bn',
        'address1_description_en',
        'address1_description_bn',
        'address2_title_en',
        'address2_title_bn',
        'address2_description_en',
        'address2_description_bn',
        'address1_status',
        'address2_status',
        'column2_menu_id',
        'column2_status',
        'column3_menu_id',
        'column3_logos',
        'column3_status',
        'column4_title_en',
        'column4_title_bn',
        'column4_image',
        'column4_text_en',
        'column4_text_bn',
        'column4_link',
        'column4_description_en',
        'column4_description_bn',
        'column4_status',
        'bottom_menu_id',
    ];

    public function media()
    {
        return $this->morphToMany(Media::class, 'entity', 'medex');
    }
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
