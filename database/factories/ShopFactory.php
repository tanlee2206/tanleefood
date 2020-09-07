<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shop;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {
    return [
        'name'=>$faker->sentence(5),
        'description' => $faker->sentence(10),
        'user_id'=>$faker->numberBetween(3, 4),
        'address_id'=>$faker->numberBetween(1, 10),
        'img' => $faker->randomElement($array = array ('asset/customer/images/product-1.jpg','asset/customer/images/product-2.jpg','asset/customer/images/product-3.jpg'))
    ];
});
