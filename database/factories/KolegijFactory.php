<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Kolegij;
use Faker\Generator as Faker;

$factory->define(Kolegij::class, function (Faker $faker) {
    $faker = \Faker\Factory::create();
    $faker->addProvider(new \Bezhanov\Faker\Provider\Educator($faker));
    
    return [
        'naziv' => $faker->course,
        'opis' =>$faker->university
    ];
});
