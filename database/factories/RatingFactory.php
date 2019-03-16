<?php

use Faker\Generator as Faker;

$factory->define(App\Rating::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->words
    ];
});
