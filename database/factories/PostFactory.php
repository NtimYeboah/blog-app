<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $draft = factory(App\Draft::class)->create();

    return [
        'draft_id' => $draft->id,
        'slug' => str_slug($draft->title)
    ];
});
