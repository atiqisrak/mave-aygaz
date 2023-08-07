<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulkUploadedImage extends Model
{
    use HasFactory;

    protected $fillable = ['image'];
}
