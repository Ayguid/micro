<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models440\Product_Attribute_Value;

$factory->define(Product_Attribute_Value::class, function (Faker $faker) {

    return [
      // 'product_id' => factory('App\Models440\Product')->create()->id,
      // 'attribute_value_id' => factory('App\Models440\Attribute_Value')->create()->id,
      'product_id' => App\Models440\Product::class,
      'attribute_value_id' => App\Models440\Attribute_Value::class,
    ];

});
