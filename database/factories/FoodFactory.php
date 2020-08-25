<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Food;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {
    $faker->addProvider(new \FakerRestaurant\Provider\vi_VN\Restaurant($faker));
    return [
        'name'=>$faker->foodName(),
        'price'=>$faker->numberBetween(100, 5000),
        'description' => $faker->sentence(10),
        'img' => $faker->randomElement($array = array ('asset/customer/images/product-1.jpg','asset/customer/images/product-2.jpg','asset/customer/images/product-3.jpg'))
    ];
});