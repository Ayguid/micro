<?php

use Illuminate\Database\Seeder;

use App\Models440\Product_Attribute_Value;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      // $this->call(UsersTableSeeder::class);
      $products = factory(App\Models440\Product::class, 1000)
      ->create()->each(function ($product) {

      $product->isInCountries()->save(factory(App\Models440\Product_In_Country::class)->make());

      // $attrVal = factory(App\Models440\Attribute_Value::class)
      // ->create();

      // $prAttV= new Product_Attribute_Value();
      // $prAttV->product_id=$product->id;
      // $prAttV->attribute_value_id=$attrVal->id;
      // $prAttV->save();


    });



}

}
