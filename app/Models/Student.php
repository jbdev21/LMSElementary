<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Student extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'users';

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('student', function (Builder $builder) {
            $builder->where('type', 'student');
        });
    }

    function getFullNameAttribute()
    {
        return $this->last_name . "," . $this->first_name . " " . $this->middle_name;
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumbnail')
            ->width(150)
            ->height(150)
            ->performOnCollections('thumbnail');
    }

    function section()
    {
        return $this->belongsTo(Section::class);
    }


}
