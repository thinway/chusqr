<?php

use Faker\Generator as Faker;
use \Carbon\Carbon;

$factory->define(App\Chusqer::class, function (Faker $faker) {
    return [
        'content'   => $faker->realText(281),
        'author'    => $faker->userName,
        'image'     => 'https://picsum.photos/150/150/?random',
        'created_at'=> Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp()),
        'updated_at'=> Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp())
    ];
});
