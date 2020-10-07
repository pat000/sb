<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$autoIncrement = autoIncrement();
$factory->define(App\Legalization::class, function (Faker $faker) use($autoIncrement) {
    $autoIncrement->next();
    return [
        'legalization_number' =>  $autoIncrement->current(),
        'title' => $faker->name,
        'date_approved' => rand(2000,2020).'-08-'.rand(1,30),
        'status' => 0, 
        'category_id' => rand(1,5),
        'uploaded_file' => '',
        'uploaded_by' => 1,
        'sponsor' => $faker->name,
    ];
});


function autoIncrement()
{
    for ($i = 0; $i < 1000; $i++) {
        yield $i;
    }
}