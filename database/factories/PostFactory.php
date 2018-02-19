<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
        'user_id' => 4,
        'title' => $faker->sentence,
        'body' => $faker->paragraph
    ];
});
