<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model implements HasMedia
{
    use HasFactory;
    protected $fillable = [
        'file_name',
        'file_type',
        'file_size',
        'file_path',
    ];
}
