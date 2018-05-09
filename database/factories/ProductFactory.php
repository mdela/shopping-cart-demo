<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween(1,3),
        'brand' => $faker->company,
        'model' => $faker->bothify('##????#?'),
        'name' => $faker->sentence(2),
        'description' => $faker->text(40),
        'price' => $faker->randomFloat(2, 200, 1000),
    ];
});
