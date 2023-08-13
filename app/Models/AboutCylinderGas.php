<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutCylinderGas extends Model
{
    protected $fillable = [
        'title1', 'description1', 'banner_image', 'title2', 'description2',
        'video_url', 'title3', 'description3', 'card_id_array1',
        'title4', 'description4', 'card_id_array2', 'status'
    ];

    protected $casts = [
        'card_id_array1' => 'json',
        'card_id_array2' => 'json',
        'status' => 'boolean',
    ];
    protected $table = 'about_cylinder_gas';
}
