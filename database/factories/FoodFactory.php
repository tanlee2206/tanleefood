<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Food;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
    return [
        'name'=>$faker->foodName(),
        'price'=>$faker->numberBetween(100, 5000),
        'description' => $faker->sentence(10),


    ];
});
// $fakerVN = \Faker\Factory::create('vi_VN');
// $factory->define(Food::class, function (Faker $faker) use ($fakerVN) {
//     return [
//         'name'        => $fakerVN->name,
//         'price'=> $faker->numberBetween(100, 5000),
//         'description' => $fakerVN->paragraph(4),
       
//     ];
// });