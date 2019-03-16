<?php

use Faker\Generator as Faker;

$factory->define(App\FilmGenre::class, function (Faker $faker) {
    return [
        'film_id' => App\Film::first()->id,
        'genre_id' => App\Genre::first()->id
    ];
});
