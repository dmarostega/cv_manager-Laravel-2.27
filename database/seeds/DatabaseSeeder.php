<?php

use App\Models\JobType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(
            [
                ProfileTypeTableSeeder::class,
                UsersTableSeeder::class,
                PhoneTypesTableSeeder::class,
                SkillTableSeeder::class,
                SocialMediaTableSeeder::class,
                JobTypeSeeder::class,
                CitiesAndStatesTableFromIBGESeeder::class

            ]
        );
        
    }
}
