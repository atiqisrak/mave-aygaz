<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $fillable = ['title_bn', 'title_en', 'description_bn', 'description_en', 'cta_button_text_bn', 'cta_button_text_en', 'cta_button_url_bn', 'cta_button_url_en', 'image'];

    protected $casts = [
        'title_bn' => 'json',
        'title_en' => 'json',
        'description_bn' => 'json',
        'description_en' => 'json',
        'cta_button_text_bn' => 'json',
        'cta_button_text_en' => 'json',
        'cta_button_url_bn' => 'json',
        'cta_button_url_en' => 'json',
    ];
}
