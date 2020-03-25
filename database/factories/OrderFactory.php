<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'mobile' => $faker->word,
        'service_type_id' => $faker->word,
        'area_id' => $faker->word,
        'supllier_id' => $faker->word,
        'orderstatus_id' => $faker->word,
        'remarks' => $faker->word,
        'amount' => $faker->randomDigitNotNull,
        'date_time' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
