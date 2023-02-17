<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Lesson extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function ScopeWithAlert($query)
    {
        return $query->addSelect(DB::raw('
                                        CASE
                                            WHEN minimum_score > (SELECT COUNT(*) FROM questions WHERE questions.lesson_id = lessons.id) 
                                            THEN 1 
                                            ELSE 0 
                                        END
                                        as alert
                                    '));
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function links()
    {
        return $this->morphMany(Link::class, 'linkable');
    }

    public function questionareDeficit()
    {
        return $this->minimum_score > $this->questions()->count();
    }

    public function getIsDeficitAttribute()
    {
        return $this->minimum_score > $this->questions()->count();
    }

    function module()
    {
        return $this->belongsTo(Module::class);
    }
}
