<?php

use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin_user =   User::create([
                            'name' => 'Diogo',
                            'email' => 'dmarostega@gmail.com',
                            'email_verified_at' => now(),
                            'password' => bcrypt('123123'),
                            'remember_token' => Str::random(10),
                            'person_id' => factory(App\Models\Person::class)->create()->id
                        ]);

        factory(App\Models\Profile::class)->create(['user_id' =>  $admin_user, 'profile_type_id' => 1]);
      
        /** USING FACTORY fakes */
        factory(App\Models\Person::class, 10)->create()->each(
            function($person){
                factory(App\Models\User::class)->create(['person_id' => $person->id])->each(
                    function($user){
                        factory(App\Models\Profile::class)->create(['user_id' => $user->id, 'profile_type_id' => rand(1,2)]);
                    }
                );
               // factory(App\Models\User::class)->create(['person_id' => $person->id]);
            }
        );

        /*
            User::create([
                'name' => "Administrador",
                'email' => 'dmarostega@gmail.com',
                'password' => bcrypt('123123')
            ]);
        */
    }
}
