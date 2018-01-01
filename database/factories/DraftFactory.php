<?php

use Faker\Generator as Faker;

$factory->define(App\Drafts::class, function (Faker $faker) {
    $user = factory(App\User::class)->create();

    return [
        'title' => $faker->text,
        'body' => $faker->paragraph(4),
        'user_id' => $user->id,
    ];
});

$factory->defineAs(App\Drafts::class, 'published', function (Faker $faker) {
    return [
        'is_published' => true,
    ];
});
