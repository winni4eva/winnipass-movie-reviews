<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Genre;
use App\Film;

class FilmGenre extends Model
{
    protected $fillable = ['film_id', 'genre_id'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
