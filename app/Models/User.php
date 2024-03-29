<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    
    protected $guarded = [];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // function accesses(){
    //     return $this->hasMany(Access::class);
    // }

    function getFullNameAttribute(){
        return $this->last_name . "," . $this->first_name . " " . $this->middle_name;
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumbnail')
            ->width(150)
            ->height(150)
            ->performOnCollections('thumbnail');
    }

    function thumbnailUrl(){
        return optional($this->getFirstMedia('thumbnail'))->getUrl("thumbnail")
                ?? asset("/images/placeholder.png");
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_taken_date' => 'datetime',
    ];


    function modules(){
        return $this->belongsToMany(Module::class);
    }

    function section(){
        return $this->belongsTo(Section::class);
    }

    function examinations(){
        return $this->hasMany(Examination::class);
    }
}
