<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function bulkGasPages()
{
    return $this->hasMany(BulkGasPage::class);
}

    protected $fillable = [
        'title_en',
        'title_bn',
        'description_bn',
        'description_en',
        'options',
        'fields',
        'submit_direction',
        'status',
    ];
}
