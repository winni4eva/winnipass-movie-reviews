<?php

use Faker\Generator as Faker;

$factory->define(App\Rating::class, function (Faker $faker) {
    return [
        'rating' => $faker->numberBetween(1, 5),
    ];
});
