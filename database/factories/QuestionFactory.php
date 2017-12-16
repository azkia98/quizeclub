<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Question::class, function (Faker $faker) {
    return [
        'title'=> 'question_'.$faker->sentence(10)
    ];
});
