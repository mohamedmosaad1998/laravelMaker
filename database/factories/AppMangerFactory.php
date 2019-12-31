<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AppManger;
use Faker\Generator as Faker;

$factory->define(AppManger::class, function (Faker $faker) {
    return [ 'name' => $faker->unique()->safeColorName, ];
});

