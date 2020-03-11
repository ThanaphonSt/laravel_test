<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(Modules\FazwazTest\Entities\Property::class, function (Faker $faker) {
    return [
        'title' => $faker->streetName,
        'description' => $faker->address,
        'bedroom' => $faker->numberBetween(1,10),
        'bathroom' => $faker->numberBetween(1,10),
        'property_id' => $faker->numberBetween(1,3),
        'status_id' => $faker->numberBetween(1,3),
        'for_sale' => $faker->numberBetween(0,1),
        'for_rent' => $faker->numberBetween(0,1),
        'project_id' => $faker->numberBetween(1,10),
        'country_id' => $faker->numberBetween(1,2)
    ];
});
