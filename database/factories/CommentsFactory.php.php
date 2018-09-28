<?php

use Faker\Generator as Faker;
use App\Post;

$factory->define(Model::class, function (Faker $faker) {
    return [
          'body'=> $faker->paragraph(2),
         'post_id' => Post::all()->random()->id,
    ];
});
