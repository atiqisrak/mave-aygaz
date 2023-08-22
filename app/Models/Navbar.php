<?php

namespace App\Models; 
use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    protected $fillable = ['menu_id', 'logo_id'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function logo()
    {
        return $this->belongsTo(Media::class, 'logo_id');
    }
}
