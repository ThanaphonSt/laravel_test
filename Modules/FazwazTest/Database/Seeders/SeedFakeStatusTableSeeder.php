<?php

namespace Modules\FazwazTest\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\FazwazTest\Entities\Status;

class SeedFakeStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();

        $active = factory(Status::class)->create([
            'status' => 'Active',
        ]);
        $inactive = factory(Status::class)->create([
            'status' => 'Inactive',
        ]);
        $draft = factory(Status::class)->create([
            'status' => 'Draft',
        ]);
    }
}
