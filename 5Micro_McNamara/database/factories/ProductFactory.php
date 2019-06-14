<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Models440\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => 4,
        'titulo_es' => $faker->firstNameMale,
        'desc_es' => $faker->text($maxNbChars = 200),
        'product_code' => $faker->unique()->numberBetween($min = 10000, $max = 90000),
        'image_path' => 'Valvula-VM_1350X900_(8)_72dpi.png'
    ];
});
