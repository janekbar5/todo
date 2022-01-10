<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Priority;
class PrioritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Priority::create(['value' => 1,'description' => 'one']); 
        Priority::create(['value' => 2,'description' => 'two']);
        Priority::create(['value' => 3,'description' => 'three']); 
        Priority::create(['value' => 4,'description' => 'four']); 
        Priority::create(['value' => 5,'description' => 'five']);  
    }
}
