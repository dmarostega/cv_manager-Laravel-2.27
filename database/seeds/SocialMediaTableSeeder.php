<?php

use App\Models\SocialMedia;
use Illuminate\Database\Seeder;

class SocialMediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SocialMedia::create([
            'title' => 'Facebook',
            'description' => 'Rede Social Chamada de Facebook',
            'link' => 'www.facebook.com.br',
            'logo_address' => 'panel/img/png/001-facebook.png'
            
        ]);

        
        SocialMedia::create([
            'title' => 'Instagram',
            'description' => 'Rede Social divulgadora de imagens chamada de Instagram',
            'link' => 'www.instagram.com.br',
            'logo_address' => 'panel/img/png/001-instagram.png'            
        ]);
    }
}
