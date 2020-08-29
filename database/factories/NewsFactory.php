<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title'=> $faker->sentence(),
        'description'=> $faker->paragraph() ,
        'article'=> $faker->text(),
        'publication_date'=> $faker->dateTime($max = 'now', $timezone = null),
        'category_id'=> Category::all()->random()->id,
        'writer'=> User::where('role_id',2)
                    ->orWhere('role_id',3)
                    ->get()->random()->id,

    ];
});
