<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    protected $fillable = ['logo', 'menu_items', 'contact_number'];

    protected $casts = ['menu_items' => 'json'];
    public function media()
    {
        return $this->morphToMany(Media::class, 'entity', 'medex');
    }
}
