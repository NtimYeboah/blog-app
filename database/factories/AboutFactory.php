<?php

use Faker\Generator as Faker;

$factory->define(App\About::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'statement' => $user->paragraph,
        'facebook_url' => $faker->url,
        'twitter_url' => $faker->url,
        'linkedin_url' => $faker->url,
        'medium_url' => $faker->url,
        'cv_url' => $faker->url,
    ];
});
