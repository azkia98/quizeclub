<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(1),
        'label'=>$faker->sentence(15)
    ];
});
