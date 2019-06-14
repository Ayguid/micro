<?php

namespace App\Models440;

use Illuminate\Database\Eloquent\Model;

use App\Models440\Product_Attribute_Value;
use App\Models440\Attribute_Value;
use App\Models440\Attribute;
use App\Models440\Country;
use App\Models440\Product_In_Country;



class Product extends Model
{

  protected $table='products';

  protected $fillable = [
    'category_id', 'titulo_es', 'titulo_en','titulo_pt','desc_es','desc_en','desc_pt','product_code',
  ];



  public function attributeValues()
  {
    return $this->hasManyThrough(Attribute_Value::class, Product_Attribute_Value::class,'product_id',  'id', 'id',  'attribute_value_id');
  }

  
  public function attributeValue($id)
  {
    return $this->attributeValues->where('attribute_id', $id)->first();
  }




  public function possibleCountries()
  {
    return Country::all();
  }



  public function isInCountries()
  {
    return $this->hasMany(Product_In_Country::class,'product_id');
  }

  public function isInCountry($id)
  {
    return $this->isInCountries->where('country_id', $id)->count()>0;
  }






}
