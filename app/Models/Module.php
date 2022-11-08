<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Module extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function quarter(){
        return $this->belongsTo(Quarter::class);
    }
}
