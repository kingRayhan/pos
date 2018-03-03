<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'number' => $faker->phoneNumber,
        'address' => $faker->address,
        'note' => $faker->paragraph
    ];
});
