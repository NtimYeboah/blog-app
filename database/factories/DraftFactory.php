<?php

use Faker\Generator as Faker;

$factory->define(App\Draft::class, function (Faker $faker) {
    $user = factory(App\User::class)->create();

    return [
        'title' => $faker->text,
        'body' => $faker->paragraph(30),
        'user_id' => $user->id,
    ];
});

$factory->defineAs(App\Draft::class, 'published', function (Faker $faker) {
    return [
        'is_published' => true,
    ];
});
