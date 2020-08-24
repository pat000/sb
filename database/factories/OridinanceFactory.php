<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;
$factory->define(App\Ordinance::class, function (Faker $faker) {
    return [
        'ordinance_number' =>  rand(1,1000),
        'title' => $faker->name,
        'date_approved' => now(),
        'status' => 0, // password
        'category_id' => rand(1,5),
        'uploaded_file' => '',
        'uploaded_by' => 1,
        'sponsor' => $faker->name,
        'approver' => '',
        'remarks' => Str::random(100),
    ];
});