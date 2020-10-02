<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'name' =>$faker->name, 
        'last_name' => $faker->lastName,
        'birthday' => $faker->dateTimeInInterval('-20 years'),
    ];
});
