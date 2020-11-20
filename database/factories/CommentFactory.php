<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post_id' => Post::all()->random()->id,
        'user_id' => User::all()->random()->id,
        'content' => $faker->sentence(),
        'parent' => $faker->randomElement([null, Comment::all()->random()->id ])
    ];
});
