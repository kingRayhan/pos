<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {

    $buy_price = $faker->numberBetween(10,2500);
    $sell_price = $buy_price + (($buy_price * 15) / 100);

    return [
        'name' => $faker->name,
        'buy_price' => $buy_price,
        'sell_price' => $sell_price,
        'stock' => $faker->numberBetween(10,1000)
    ];
});
