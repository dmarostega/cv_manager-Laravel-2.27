<?php

use App\Models\PhoneType;
use Illuminate\Database\Seeder;

class PhoneTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhoneType::create([
            'title' => 'Celular'
        ]);
        PhoneType::create([
            'title' => 'Fixo'
        ]);
        PhoneType::create([
            'title' => 'Residencial'
        ]);
        PhoneType::create([
            'title' => 'Trabalho'
        ]);

    }
}
