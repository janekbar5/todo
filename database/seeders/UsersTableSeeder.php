<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([                    
                'name' => 'Janek 1',
                'email' => 'janekbar1@interia.pl',
                'password' => \Illuminate\Support\Facades\Hash::make('janekbar1@interia.pl'),
        ]);   
        User::create([                    
                'name' => 'Janek 2',
                'email' => 'janekbar2@interia.pl',
                'password' => \Illuminate\Support\Facades\Hash::make('janekbar2@interia.pl'),
        ]); 
        User::create([                    
                'name' => 'Janek 3',
                'email' => 'janekbar3@interia.pl',
                'password' => \Illuminate\Support\Facades\Hash::make('janekbar3@interia.pl'),
        ]); 
         User::create([                    
                'name' => 'Janek 4',
                'email' => 'janekbar4@interia.pl',
                'password' => \Illuminate\Support\Facades\Hash::make('janekbar4@interia.pl'),
        ]);   
    }
}
