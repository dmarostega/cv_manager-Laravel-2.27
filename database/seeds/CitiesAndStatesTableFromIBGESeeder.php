<?php

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class CitiesAndStatesTableFromIBGESeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $urlIBGECities = 'https://servicodados.ibge.gov.br/api/v1/localidades/municipios';
        $response = Http::withoutVerifying()->get($urlIBGECities);
/*
    PhoneType::create([
            'title' => 'Celular'

        ]); */

 /**
     * JSON IBGE
     *//*
        array:3 [▼
                "id" => 1100015
                "nome" => "Alta Floresta D'Oeste"
                "microrregiao" => array:3 [▼
                    "id" => 11006
                    "nome" => "Cacoal"
                    "mesorregiao" => array:3 [▼
                    "id" => 1102
                    "nome" => "Leste Rondoniense"
                    "UF" => array:4 [▼
                        "id" => 11
                        "sigla" => "RO"
                        "nome" => "Rondônia"
                        "regiao" => array:3 [▼
                        "id" => 1
                        "sigla" => "N"
                        "nome" => "Norte"
                        ]
                    ]
                    ]
                ]
            ]
     */

        foreach($response->json() as $k => $city){
            //DB::table('users')->find(3);

            if( DB::table('cities')->find($city['id']) === null ){
                // if(DB::table('cities')->where('id', $city['id'])->first()){
                City::create([
                    'id' => $city['id'],
                    'name' => $city['nome'],
                    'state_id' => $city['microrregiao']['mesorregiao']['UF']['id']
                ]);  
            }

            if( DB::table('states')->find($city['microrregiao']['mesorregiao']['UF']['id']) === null ){
               // if(DB::table('states')->where('id', $city['microrregiao']['mesorregiao']['UF']['id'])->first()){
                State::create([
                    'id' => $city['microrregiao']['mesorregiao']['UF']['id'],
                    'name' =>  $city['microrregiao']['mesorregiao']['UF']['nome'],
                    'initials' =>  $city['microrregiao']['mesorregiao']['UF']['sigla'],
                    'country_id' => 3469034, // by https://www.geonames.org/3469034/brazil.html
                ]);
            }
        }
        
        //
    }
}
