<?php

use Faker\Generator as Faker;

$factory->define(App\Slide::class, function (Faker $faker) {
    $user = factory(App\User::class)->create();

    return [
        'url' => $faker->url,
        'user_id' => $user->id,
        'description' => $faker->paragraph
    ];
});

$factory->defineAs(App\Slide::class, 'published', function () {
    return [
        'is_published' => 1
    ];
});
