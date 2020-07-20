<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Announcement;
use Faker\Generator as Faker;

$factory->define(Announcement::class, function (Faker $faker) {
  $user = \App\User::where('id_level', 1)->orWhere('id_level', 3)->inRandomOrder()->first();
  $idTo = \App\Currency::inRandomOrder()->first();
  $idFrom = \App\Currency::inRandomOrder()->first();
    return [
        //
        'id_user' => $user->id,
        'id_currency_from' => $idFrom->id,
        'id_currency_to' => $idTo->id,
        'id_category' => 1,
        'title' => "Compro $idTo->name por $idFrom->name al mejor precio" ,
        'description' => "$faker->paragraph",
        'price' => 202000,
        'min' => 10,
        'max' => 2000,
    ];
});
