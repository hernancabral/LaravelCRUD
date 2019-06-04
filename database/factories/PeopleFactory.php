<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\People;
use Faker\Generator as Faker;

$factory->define(People::class, function (Faker $faker) {
    $leader = App\People::pluck('id')->toArray();
    return [       
        'name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->email,
        'picture' => Str::random(5),
        'code' => Str::random(5),
        'leader_id' => $faker->randomElement($leader),
    ];
});
