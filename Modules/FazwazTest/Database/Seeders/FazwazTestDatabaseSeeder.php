<?php

namespace Modules\FazwazTest\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FazwazTestDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();

        // $this->call("OthersTableSeeder");
        
        $this->call("Modules\FazwazTest\Database\Seeders\SeedFakeTypePropTableSeeder");
        $this->call("Modules\FazwazTest\Database\Seeders\SeedFakeStatusTableSeeder");
        $this->call("Modules\FazwazTest\Database\Seeders\SeedFakeProjectNameTableSeeder");
        $this->call("Modules\FazwazTest\Database\Seeders\SeddFakeCountryTableSeeder");
        $this->call("Modules\FazwazTest\Database\Seeders\SeedFakePropertyTableSeeder");
    }
}
