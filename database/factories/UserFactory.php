<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use App\User;
use App\Volunteer;
use App\Article;
use App\Role;
use App\Committee;
use App\Photo;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
        'admin' => $faker->randomElement([0, 1]),
    ];
});


$factory->define(Role::class, function (Faker $faker) {
    return [
    	'name' => $faker->word,
    ];
});

$factory->define(Committee::class, function (Faker $faker) {
    return [
    	'name' => $faker->word,
    ];
});


$factory->define(Article::class, function (Faker $faker) {

    $title = $faker->sentence;

    return [
        'title' => $title,
        'description' => $faker->paragraph,
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
    	'link' => $faker->url,
    ];
});

$factory->define(Event::class, function (Faker $faker) {

    $title = $faker->sentence;
    $startingDate = $faker->dateTimeBetween('next Monday', 'next Monday +7 days');

    return [
        'title' => $title,
        'description' => $faker->paragraph,
        'start_date' => $startingDate,
        'end_date' => $faker->dateTimeBetween($startingDate, $startingDate->format('Y-m-d').' +2 days'),
        'link' => $faker->url
    ];
});

$factory->define(Volunteer::class, function (Faker $faker) {

    $title = $faker->sentence;

    return [
        'arab_name' => $faker->word,
        'eng_name' => $faker->word,
        'gmail' => $faker->url,
        'linkedin' => $faker->url,
        'role_id' => Role::all()->random()->id,
        'committee_id' => Committee::all()->random()->id,
    ];
});

$factory->define(Photo::class, function (Faker $faker) {

	$admin_id = User::all()->random()->id;
    $volunteer_id = Volunteer::all()->random()->id;
    $article_id = Article::all()->random()->id;

	$photoable_id = $faker->randomElement([ $admin_id,$volunteer_id,$article_id ]);
	$photoable_type = $photoable_id == $admin_id ? 'App\User' : ($photoable_id == $volunteer_id ? 'App\Volunteer' : 'App\Article');

    return [
    	'filename' => $faker->randomElement(['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg',]),

    	'photoable_id' => $photoable_id,
    	'photoable_type' => $photoable_type,
    ];
});


