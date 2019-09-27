<?php

use App\Product;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'brand' => $faker->name,
        'user_id' => $faker->numberBetween($min = 1, $max = 3),
        'body' => $faker->text($maxNbChars = 200),
        'price' => $faker->randomDigitNotNull,
        'discount' => $faker->numberBetween($min = 0, $max = 90),
        'image' => $faker->imageUrl($width = 500, $height = 500),
        'count' => $faker->numberBetween($min = 1, $max = 3000),
        'cat' => $faker->numberBetween($min = 1, $max = 3),
    ];
});
