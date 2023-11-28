<?php

namespace Database\Seeders;

use App\Models\CancerTypes;
use Illuminate\Database\Seeder;

class CancerTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CancerTypes::factory()->count(5)->create();
    }
}
