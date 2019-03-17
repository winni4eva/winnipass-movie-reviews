<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rating;
use App\Film;

class FilmRating extends Model
{
    protected $fillable = ['film_id', 'rating_id'];
    
    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function rating()
    {
        return $this->belongsTo(Rating::class);
    }
}
