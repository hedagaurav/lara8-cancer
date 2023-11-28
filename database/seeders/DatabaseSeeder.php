<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'gaurav heda',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('test@123'),
        ]);

        $this->call([CancerTypesSeeder::class]);
        $this->call([DoctorSeeder::class]);
        $this->call([PatientSeeder::class]);

    }
}
