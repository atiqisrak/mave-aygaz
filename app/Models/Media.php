<?php
namespace App\Models;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Model;

class Media extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $fillable = [
        'filename', 'mime_type', 'url',
    ];
}
