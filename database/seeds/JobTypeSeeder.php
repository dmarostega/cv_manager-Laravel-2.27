<?php

use Illuminate\Database\Seeder;
use App\Models\JobType;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobType::create([  
            'title' => 'Autonômo',
            'description' => 'Trabalho sem vinculo a uma empresa.'
        ]);

        JobType::create([  
            'title' => 'Tempo Integral',
            'description' => 'Trabalho em tempo integral, normalmente vinculado a empresa.'
        ]);
    }
}
