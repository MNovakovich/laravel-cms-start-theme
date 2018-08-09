<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        //'role_id'=>$faker->numberBetween(1,3),
        'is_admin'=>User::IS_NOT_ADMIN,
        'status'=>User::IS_ACTIVE,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
