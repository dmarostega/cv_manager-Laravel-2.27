<?php

use App\Models\ProfileType;
use Illuminate\Database\Seeder;

class ProfileTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfileType::create([
            'title' => 'Administrador',
            'description' => 'Administrador do Sistema.'
        ]);

        
        ProfileType::create([
            'title' => 'Usuário',
            'description' => 'Usuário do Sistema.'
        ]);
    }
}
