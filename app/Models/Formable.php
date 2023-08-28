<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formable extends Model
{
    protected $fillable = [
        'form_id',
        'formable_id',
        'formable_type',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function formable()
    {
        return $this->morphTo();
    }
}
