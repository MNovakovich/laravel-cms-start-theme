<?php

use Faker\Generator as Faker;
use App\User;
use App\Category;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->paragraph(1),
        'body' => $faker->paragraph(4),
        'status' => 'published',
        'user_id' => User::all()->random()->id,
        'category_id' => Category::all()->random()->id,
    ];
});
