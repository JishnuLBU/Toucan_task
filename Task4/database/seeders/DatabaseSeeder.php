<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\member;
use App\Models\school;
use App\Models\SchoolMapping;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       member::factory(20)->create();
       school::factory(20)->create();
       Country::factory(20)->create();
       SchoolMapping::factory(20)->create();
    }

}
