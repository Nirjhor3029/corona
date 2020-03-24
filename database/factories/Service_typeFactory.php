<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Service_type;
use Faker\Generator as Faker;

$factory->define(Service_type::class, function (Faker $faker) {

    return [
        'service_name' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
