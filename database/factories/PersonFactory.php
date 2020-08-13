<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Person::class, function (Faker $faker) {
    return [
        'person_name' => $faker->name,
        'person_nick_name' => $faker->name,
        'person_type_id' =>101,
        'company_id' =>111,
        'active'=>1
    ];
});
