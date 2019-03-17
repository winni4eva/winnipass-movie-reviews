<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Genre;
use App\Film;

class FilmGenre extends Model
{
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
