<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Answer::class, function (Faker $faker) {
    return [
        'title'=>'answer_'.$faker->sentence(6)
    ];
});
