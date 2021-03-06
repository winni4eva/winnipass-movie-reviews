<?php

use Faker\Generator as Faker;
use App\Film;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'film_id' => Film::first()->id,
        'img_path' => $faker->imageUrl
    ];
});
