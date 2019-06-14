<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models440\Product_Attribute;

$factory->define(Product_Attribute::class, function (Faker $faker) {

    return [
      // 'product_id' => factory('App\Models440\Product')->create()->id,
      // 'attribute_value_id' => factory('App\Models440\Attribute_Value')->create()->id,
      'product_id' => App\Models440\Product::class,
      'attribute_id' => App\Models440\Attribute::class,
      'value' => $faker->numberBetween($min = 100, $max = 1000),
    ];

});
