<?php

use Faker\Generator as Faker;
use App\Rating;
use App\Country;
use App\Genre;
use App\Image;

$factory->define(App\Movie::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->words,
        'slug' => $faker->slug,
        'rating_id' => Rating::first()->id,
        'country_id' => Country::first()->id,
        'genre_id' => Genre::first()->id,
        'image_id' => Image::first()->id,
        'release_date' => now()
    ];
});
