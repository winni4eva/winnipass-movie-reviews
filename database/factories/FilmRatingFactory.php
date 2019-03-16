<?php

use Faker\Generator as Faker;

$factory->define(App\FilmRating::class, function (Faker $faker) {
    return [
        'film_id' => App\Film::first()->id,
        'rating_id' => App\Rating::first()->id
    ];
});
