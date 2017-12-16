<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Correct_answer::class, function (Faker $faker) {
    return [
        'isCorrect'=>rand(0,1)
    ];
});
