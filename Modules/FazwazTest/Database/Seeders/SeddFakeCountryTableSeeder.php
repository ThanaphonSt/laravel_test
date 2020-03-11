<?php

namespace Modules\FazwazTest\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\FazwazTest\Entities\Country;
class SeddFakeCountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();

        $active = factory(Country::class)->create([
            'country' => 'Thailand',
        ]);
        $inactive = factory(Country::class)->create([
            'country' => 'Cambodia',
        ]);
    }
}
