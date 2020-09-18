<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Comment;
use App\Models\News;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraph(),
        'made_by' => User::all()->random()->id,
        'date' => $faker->dateTime($max = 'now', $timezone = null),
        'news_id' => News::all()->random()->id,
    ];
});
