<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'mig_path' => $faker->imageUrl
    ];
});
