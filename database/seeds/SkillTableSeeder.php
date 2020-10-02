<?php

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::create([
            'name' => 'PHP',
            'description' => 'Conhecimento na Linguagem PHP'
        ]);

        Skill::create([
            'name' => 'Laravel',
            'description' => 'Conhecimento no Framework Laravel'
        ]);

        Skill::create([
            'name' => 'CSS3',
            'description' => 'Conhecimento na linguagem de estilo CSS versão 3.'
        ]);
    }
}
