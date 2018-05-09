<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Client::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\Models\User::class)->create()->id;
        },
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'dni' => $faker->numerify('########'),
        'phone' => $faker->e164PhoneNumber,
        'address_id'  => function () {
            return factory(App\Models\Address::class)->create()->id;
        },
    ];
});
