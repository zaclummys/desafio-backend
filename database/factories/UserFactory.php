<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'cpf' => $faker->cpf,
        'birthdate' => $faker->date,
        'balance' => $faker->numberBetween(1, 1000),
        'password' => bcrypt('password'),
    ];
});

$factory->state(User::class, 'without-balance', function () {
    return [
        'balance' => 0,
    ];
});
