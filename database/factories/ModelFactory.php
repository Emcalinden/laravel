<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Algorithmaths\User::class, function (Faker\Generator $faker) {
    return [

    	'first_name'=>$faker->word,
    	'last_name'=>$faker->word,
        'username' => $faker->word,
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

  
