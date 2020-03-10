<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(Modules\FazwazTest\Entities\TypeOfProperty::class, function (Faker $faker) {
    $arrayType = array("Condo"=>"1","House"=>"2","Land"=>"3");
    return [
        'type' => array_rand($arrayType,1)
    ];
});
