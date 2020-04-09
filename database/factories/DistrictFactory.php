<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\District;
use Faker\Generator as Faker;

$factory->define(District::class, function (Faker $faker) {

    return [
        'division_id' => $faker->word,
        'name' => $faker->word,
        'bn_name' => $faker->word,
        'lat' => $faker->word,
        'lon' => $faker->word,
        'url' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
