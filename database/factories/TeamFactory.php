<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    $leader = App\People::pluck('id')->toArray();
    return [       
        'name' => $faker->name,
        'leader_id' => $faker->randomElement($leader),
    ];
});
