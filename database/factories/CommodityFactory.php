<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Commodity;
use Faker\Generator as Faker;

$factory->define(Commodity::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
//      'category' => $faker->name,
        'amount' => $faker->numberBetween($min = 0, $max = 12),
        'price' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});
