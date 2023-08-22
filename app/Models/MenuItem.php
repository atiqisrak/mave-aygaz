<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'link'];

    public function entities()
    {
        return $this->belongsToMany(Menu::class, 'menx', 'menu_item_id', 'menu_id');
    }
}