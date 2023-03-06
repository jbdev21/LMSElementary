<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Student extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Searchable;

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

    function thumbnailUrl(){
        return $this->getFirstMediaUrl('thumbnail', 'thumbnail') ?? url("/images/avatar.png");
        return optional($this->getFirstMedia('thumbnail'))->getUrl("thumbnail")
                ?? asset("/images/placeholder.png");
                // return $this->getFirstMediaUrl('profiles', 'thumb') ?? url("/images/avatar.png");
    }

    public function registerMediaConversions(Media $media = null): void
    {
        // $this->addMediaConversion('thumbnail')
        //     ->width(150)
        //     ->height(150)
        //     ->performOnCollections('thumbnail');

            $this->addMediaConversion('thumbnail')
            ->performOnCollections("thumbnail")
            ->crop('crop-center', 150, 150);
    }

    function section()
    {
        return $this->belongsTo(Section::class);
    }

    function modules()
    {
        return $this->belongsToMany(Module::class);
    }

}
