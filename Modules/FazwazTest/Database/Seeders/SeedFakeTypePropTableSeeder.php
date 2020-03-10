<?php

namespace Modules\FazwazTest\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\FazwazTest\Entities\TypeOfProperty;

class SeedFakeTypePropTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();

        // $propertyType = factory(TypeOfProperty::class, 3)->create();
        $condo = factory(TypeOfProperty::class)->create([
            'type' => 'Condo',
        ]);
        $house = factory(TypeOfProperty::class)->create([
            'type' => 'House',
        ]);
        $land = factory(TypeOfProperty::class)->create([
            'type' => 'Land',
        ]);
    }
}
