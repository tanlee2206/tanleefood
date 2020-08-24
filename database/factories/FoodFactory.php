<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Food;
use Faker\Generator as Faker;

// $factory->define(Food::class, function (Faker $faker) {
//     $faker->addProvider(new \FakerRestaurant\Provider\vi_VN2\Restaurant($faker));
//     return [
//         'name'=>$faker->foodName(),
//         'price'=>$faker->numberBetween(100, 5000),
//         'description' => $faker->sentence(10),
//     ];
// });
$factory->define(Food::class, function (Faker $faker) {
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
    return [
        'name'=>$faker->foodName(),
        'price'=>$faker->numberBetween(100, 5000),
        'description' => $faker->sentence(10),
    ];
});