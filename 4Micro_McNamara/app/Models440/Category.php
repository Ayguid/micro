<?php

namespace App\Models440;

use Illuminate\Database\Eloquent\Model;
use App\Models440\Product;
use App\Models440\Product_in_country;
use App\Models440\Category_Attribute_Value;
use App\Models440\Attribute_Value;

// use App\Helper_Functions\getClassHelper;

class Category extends Model
{
    // use getClassHelper;

    protected $table = 'categories';

    protected $fillable = [
    'parent_id', 'titulo_es', 'titulo_en', 'titulo_pt', 'desc_es', 'desc_en', 'desc_pt'
    ];


    public function attributeValues()
    {
      return $this->hasManyThrough(Attribute_Value::class, Category_Attribute_Value::class, 'category_id',  'id', 'id',  'attribute_value_id');
    }


    //
    public function children()
    {
      return $this->hasMany($this, 'parent_id');
    }
    //
    public function getSubCategories()
    {
      return $this->children()->with('getSubCategories');
    }



    //
    public function father()
    {
      return $this->belongsTo($this,'parent_id', 'id');
    }
    //
    public function getTopCategories()
    {
      return $this->father()->with('getTopCategories');
    }


    //
    public function products()
    {
      return $this->hasMany(Product::class);
    }




    public function productsInCountry($id)
    {
      $products=$this->products();
      return $products->join('products_in_countries', 'products_in_countries.product_id', '=', 'products.id')
      ->where('products_in_countries.country_id','=', $id)
      ->select('products.*');
    }








    // public function models()
    // {
    //   $class=$this->classGetter($this->table_id);
    //   $new=new $class();
    //   return $new->select('Modelo')->where('Modelo', '!=', null)->where('category_id', $this->id)->distinct()->orderBy('Modelo')->get();
    // }




}
