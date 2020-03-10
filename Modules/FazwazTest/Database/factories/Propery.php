<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(Modules\FazwazTest\Entities\Property::class, function (Faker $faker) {
    return [
        'title' => $faker->streetName,
        'description' => $faker->address,
        'bedroom' => $faker->numberBetween(1,10),
        'bathroom' => $faker->numberBetween(1,10),
        'property_type' => $faker->numberBetween(1,3),
        'status' => $faker->numberBetween(1,3),
        'for_sale' => $faker->numberBetween(0,1),
        'for_rent' => $faker->numberBetween(0,1),
        'project_name' => $faker->company,
        'country' => $faker->numberBetween(1,2)
    ];
});
