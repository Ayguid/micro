<?php

namespace App\Models440;

use Illuminate\Database\Eloquent\Model;
use App\Models440\Product;
use App\Models440\Product_in_country;
// use App\Helper_Functions\getClassHelper;

class Category extends Model
{
    // use getClassHelper;


    protected $fillable = [
    'parent_id', 'desc_es', 'image_path', 'table_name',
  ];

    public function children()
    {
      return $this->hasMany($this,'parent_id');
    }

    public function getSubCategories()
    {
      return $this->children()->with('getSubCategories');
    }

    public function productsInCountry($id)
    {
      $products=$this->products();
      return $products->join('products_in_countries', 'products_in_countries.product_id', '=', 'products.id')
      ->where('products_in_countries.country_id','=', $id)
      ->select('products.*');
    }



    public function products()
    {
      return $this->hasMany(Product::class);
    }


    // public function models()
    // {
    //   $class=$this->classGetter($this->table_id);
    //   $new=new $class();
    //   return $new->select('Modelo')->where('Modelo', '!=', null)->where('category_id', $this->id)->distinct()->orderBy('Modelo')->get();
    // }




}
