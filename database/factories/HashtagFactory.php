<?php

use \Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Hashtag::class, function (Faker $faker) {

    $slug = str_random(10);
    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());

    return [
        'slug' => $faker->word,
        'created_at'=> ($time1 < $time2) ? $time1 : $time2,
        'updated_at'=> ($time1 > $time2) ? $time1 : $time2
    ];
});
