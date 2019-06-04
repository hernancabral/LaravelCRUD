<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Planning;
use Faker\Generator as Faker;

$factory->define(Planning::class, function (Faker $faker) {
    $tag = App\Tag::pluck('id')->toArray();
    return [
        'tag_id' => $faker->randomElement($tag),
        'name' => $faker->name,
    ];
});
