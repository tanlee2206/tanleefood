<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Food;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {
    $faker->addProvider(new \FakerRestaurant\Provider\vi_VN\Restaurant($faker));
    return [
        'name'=>$faker->foodName(),
        'price'=>$faker->numberBetween(10000, 100000),
        'description' => $faker->sentence(40),
        'category_id'=>$faker->randomElement($array = array (1,2,3)),
        'shop_id'=>$faker->randomElement($array = array (1,2,3)),
        'img' => $faker->randomElement($array = array ('asset/customer/images/product-1.jpg','asset/customer/images/product-2.jpg','asset/customer/images/product-3.jpg'))
    ];
});