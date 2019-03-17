<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FilmGenre;
use App\Image;
use App\Country;
use App\Comment;
use App\FilmRating;

class Film extends Model
{
    public function ratings()
    {
        return $this->hasMany(FilmRating::class);
    }

    public function genres()
    {
        return $this->hasMany(FilmGenre::class, 'id');
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function country()
    {
        return $this->hasOne(Country::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
