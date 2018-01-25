<?php

use Faker\Generator as Faker;
use \Carbon\Carbon;

$factory->define(App\Chusqer::class, function (Faker $faker) {

    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());

    return [
        'content'   => $faker->realText(281),
        'image'     => 'https://picsum.photos/150/150/?random',
        'created_at'=> ($time1 < $time2) ? $time1 : $time2,
        'updated_at'=> ($time1 > $time2) ? $time1 : $time2
    ];
});
