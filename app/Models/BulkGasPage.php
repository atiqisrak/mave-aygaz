<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BulkGasPage extends Model
{
    protected $fillable = [
        'title', 'banner', 'title2', 'description2', 'section2_cards', 'section3_cards', 'title4', 'section4_cards', 'title5', 'section5_cards', 'status',
    ];

    protected $casts = [
        'section2_cards' => 'json',
        'section3_cards' => 'json',
        'section4_cards' => 'json',
        'section5_cards' => 'json',
    ];
}
