<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Invoice::class, function (Faker\Generator $faker) {
    return [
        'numero' => $faker->unique()->randomNumber(5),
        'name' => $faker->name,
        'address' => $faker->address,
        'city' => $faker->city,
        'postcode' => $faker->postcode,
        'created_at' => $faker->dateTimeBetween('-1 year', 'now')
    ];
});