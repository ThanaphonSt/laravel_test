<?php

namespace Modules\FazwazTest\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\FazwazTest\Entities\Property;

class SeedFakePropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();

        $property = factory(Property::class, 10)->create();
    }
}
