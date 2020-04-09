<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Union;
use Faker\Generator as Faker;

$factory->define(Union::class, function (Faker $faker) {

    return [
        'upazilla_id' => $faker->word,
        'name' => $faker->word,
        'bn_name' => $faker->word,
        'url' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
