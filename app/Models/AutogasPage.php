<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutogasPage extends Model
{
    protected $fillable = [
        'title', 'description', 'card_id_array1', 'title2', 'description2',
        'card_id_array2', 'short_descriptions', 'image', 'status',
    ];

    protected $casts = [
        'card_id_array1' => 'json',
        'card_id_array2' => 'json',
        'short_descriptions' => 'json',
        'status' => 'boolean',
    ];
}
