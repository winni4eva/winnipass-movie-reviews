<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rating;
use App\FilmGenre;
use App\Genre;
use App\Image;
use App\Country;
use App\Comment;

class Film extends Model
{
    public function rating()
    {
        return $this->hasOne(Rating::class);
    }

    public function genres()
    {
        return $this->hasManyThrough(FilmGenre::class, Genre::class);
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
