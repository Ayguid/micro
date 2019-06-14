<?php

namespace App\Models440;

use Illuminate\Database\Eloquent\Model;
use App\Models440\Product;
use App\Helper_Functions\getClassHelper;

class Category extends Model
{
    use getClassHelper;

  // protected $fillable = [
  // ];

    public function children()
    {
      return $this->hasMany($this,'parent_id');
    }

    public function getSubCategories()
    {
      return $this->children()->with('getSubCategories');
    }


    public function products()
    {
      return $this->hasMany(Product::class);
    }


    public function models()
    {
      $class=$this->classGetter($this->table_id);
      $new=new $class();
      return $new->select('Modelo')->where('Modelo', '!=', null)->where('category_id', $this->id)->distinct()->orderBy('Modelo')->get();
    }




}
