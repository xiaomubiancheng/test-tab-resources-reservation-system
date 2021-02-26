<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'truename' => $faker->name(),
        'password' => bcrypt('123456'),
        'itcode' => substr($faker->userName(), 0, rand(4, 8)),
        'email' => $faker->email,
        'itcode_status' => $faker->numberBetween(0,1),
    ];
});
