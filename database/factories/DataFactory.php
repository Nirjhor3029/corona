<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Data;
use Faker\Generator as Faker;

$factory->define(Data::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'mobile' => $faker->word,
        'service_type' => $faker->word,
        'living_area' => $faker->word,
        'date_time' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
