<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        //
        'name'=> $faker->name,
        'desc'=>$faker->sentence(),
        'content'=>$faker->sentence(),
        'price'=>$faker->numberBetween(1000,5000),
        'img'=>$faker->randomNumber().".png",
        'category_id'=>rand(1,4),
        'trainer_id'=>rand(1,4),
        'created_at'=>now(),
        'updated_at'=>now(),
    ];
});
