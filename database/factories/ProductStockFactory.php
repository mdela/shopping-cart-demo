<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ProductStock::class, function (Faker $faker) {
	
	$initStock = $faker->numberBetween(1,5);
    
    return [
    	'product_id' => function () {
            return factory(App\Models\Product::class)->create()->id;
        },
        'initial' => $initStock,
        'current' => $faker->numberBetween(1,$initStock),
    ];
});
