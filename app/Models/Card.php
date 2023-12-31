<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Card extends Model
{
    protected $fillable = [
    'page_name', 
    'media_ids', 
    'title_en',
    'title_bn',
    'description_en',
    'description_bn',
    'link_url',
    'status',
];

    public function media()
    {
        return $this->morphToMany(Media::class, 'entity', 'medex');
    }

    public function pages(): MorphToMany
    {
        return $this->morphToMany(Page::class, 'cardable');
    }
}