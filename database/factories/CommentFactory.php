<?php

use Faker\Generator as Faker;
use App\User;
use App\Film;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'user_id' => User::first()->id,
        'film_id' => Film::first()->id,
        'comment' => $faker->sentence
    ];
});
