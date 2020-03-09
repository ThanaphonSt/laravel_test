<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(Modules\FazwazTest\Entities\Property::class, function (Faker $faker) {
    return [
        'Title' => $faker->streetName,
        'Description' => $faker->address,
        'Bedroom' => $faker->numberBetween(1,10),
        'Bathroom' => $faker->numberBetween(1,10),
        'Property_type' => $faker->numberBetween(1,3),
        'Status' => $faker->numberBetween(1,3),
        'For_sale' => $faker->numberBetween(0,1),
        'For_rent' => $faker->numberBetween(0,1),
        'Project_name' => $faker->company,
        'Country' => $faker->numberBetween(1,2)
    ];
});
