<?php

namespace Modules\FazwazTest\Database\Seeders;
// use Faker\Generator as Faker;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\FazwazTest\Entities\ProjectName;
class SeedFakeProjectNameTableSeeder extends Seeder
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
        $projectName = factory(ProjectName::class, 10)->create();
      
    }
}
