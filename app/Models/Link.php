<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $guarded = [];
    /**
     * Get the parent imageable model (user or post).
     */
    public function linkable()
    {
        return $this->morphTo();
    }
}
