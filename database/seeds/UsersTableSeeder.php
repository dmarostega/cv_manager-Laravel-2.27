<?php

use App\Models\Person;
use App\Models\Profile;
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
        $adminUser = User::create([
            'name' => 'Diogo',
            'email' => 'dmarostega@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
            'person_id' => Person::factory()->create()->id,
        ]);

        Profile::factory()->create([
            'user_id' => $adminUser->id,
            'profile_type_id' => 1,
        ]);

        /** USING FACTORY fakes */
        Person::factory()
            ->count(10)
            ->create()
            ->each(function (Person $person): void {
                $user = User::factory()->create(['person_id' => $person->id]);

                Profile::factory()->create([
                    'user_id' => $user->id,
                    'profile_type_id' => rand(1, 2),
                ]);
            });

        /*
            User::create([
                'name' => "Administrador",
                'email' => 'dmarostega@gmail.com',
                'password' => bcrypt('123123')
            ]);
        */
    }
}
