<?php

use Faker\Generator as Faker;
use App\Rating;
use App\Country;
use App\Genre;
use App\Image;

$factory->define(App\Film::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->words,
        'slug' => $faker->slug,
        'country_id' => Country::first()->id,
        'release_date' => now(),
        'ticket_price' => 24.55
    ];
});
