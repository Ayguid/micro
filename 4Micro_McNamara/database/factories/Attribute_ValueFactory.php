<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models440\Attribute_Value;



$factory->define(Attribute_Value::class, function (Faker $faker) {
    return [
      'attribute_id' => 67,
      'attribute_value_desc' => $faker->firstNameMale,
    ];
});
