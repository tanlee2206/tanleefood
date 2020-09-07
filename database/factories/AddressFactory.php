<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'address_detail' => $faker->sentence(10),
        'wards_id'=>$faker->numberBetween(1, 10),
    ];
});
