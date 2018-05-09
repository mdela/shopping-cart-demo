<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Address::class, function (Faker $faker) {
    return [
        'street' => $faker->streetName,
        'number' => $faker->buildingNumber,
        'floor' => $faker->randomDigitNotNull,
        'dept' => $faker->randomLetter,
        'postal_code' => $faker->postcode,
        'city' => $faker->city,
        'country' => $faker->country,
    ];
});
