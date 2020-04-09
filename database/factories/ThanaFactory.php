<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Thana;
use Faker\Generator as Faker;

$factory->define(Thana::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'district_id' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
