<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $casts = [
        'options' => 'array'
    ];

    function module(){
        return $this->belongsTo(Module::class);
    }

    function lesson(){
        return $this->belongsTo(Lesson::class);
    }


}
