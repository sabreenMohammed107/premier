<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Company::class, function (Faker $faker) {
    return [
        'company_official_name' => $faker->name,
        'company_nick_name' => $faker->name,
        'address' => $faker->text,
        'active'=>1
    ];
});
