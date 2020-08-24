<?php

use Faker\Generator as Faker;

$factory->define(App\Ordinance::class, function (Faker $faker) {
    return [
        'oridinance_number' => $faker->oridinance_number,
        'title' => $faker->name,
        'date_approved' => now(),
        'status' => 0, // password
        'category_id' => Str::random(5),
        'uploaded_file' => '',
        'uploaded_by' => 1,
        'sponsor' => $faker->name,
        'approver' => '',
        'remarks' => $faker->paragraph,
    ];
});
