<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\UserLevel;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|s
*/

$factory->define(User::class, function (Faker $faker) {
    return [
       'id_level' => UserLevel::inRandomOrder()->value('id') ?: factory(UserLevel::class),
      'username' => $faker->userName,
      'email' => $faker->unique()->safeEmail,
      'password' => Hash::make('password'), //password,
      'phone' => $faker->phoneNumber,

      'email_verify' => 1,
      'phone_verify' => 1,
      'token_verify' => 1,
      'verified' => 1,

      'phone_token' => $faker->numberBetween($min = 100000, $max = 900000),
      'email_token' => Str::random(40),


    ];
});
