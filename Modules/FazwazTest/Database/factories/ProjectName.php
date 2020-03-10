<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
;
$factory->define(Modules\FazwazTest\Entities\ProjectName::class, function (Faker $faker) {
    // $faker->seed('2');
    return [
        'project_name' => $faker->streetName
    ];
});
