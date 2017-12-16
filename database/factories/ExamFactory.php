<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Models\Exam::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(10),
        'expiry'=> Carbon::now()->addDay(5),
    ];
});
