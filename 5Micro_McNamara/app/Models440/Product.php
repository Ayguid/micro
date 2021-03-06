<?php

namespace App\Models440;

use Illuminate\Database\Eloquent\Model;

use App\Models440\Product_Attribute;
use App\Models440\Attribute;
use App\Models440\Country;
use App\Models440\Category;
use App\Models440\Product_In_Country;
use App\Models440\File;



class Product extends Model
{

  protected $table='products';

  protected $fillable = [
    'category_id', 'title_es', 'title_en','title_pt','desc_es','desc_en','desc_pt','product_code', 'page',
    // 'image_path', 'cad_2d', 'cad_3d','pdf_es','pdf_en','pdf_pt'
  ];


  public function category()
  {
    return $this->hasOne(Category::class, 'id', 'category_id');
  }

  public function attributes()
  {
    return $this->hasMany(Product_Attribute::class, 'product_id', 'id');
  }


  public function attributeValue($id)
  {
    return $this->attributes()->where('attribute_id', $id)->first();
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



  public function files()
  {
    return $this->morphMany(File::class, 'fileable');
  }



  public function hasImages()
  {
    $images =collect();
    foreach ($this->files as $file) {
      ($file->extension()=='jpg'||$file->extension()=='png')?$images->add($file):'';
    }
    if($images->count()>0) {
      return $images;
    }else {
      return false;
    }
  }


  public function hasPdfs()
  {
    $pdfs =collect();
    foreach ($this->files as $file) {
      ($file->extension()=='pdf')?$pdfs->add($file):'';
    }
    if($pdfs->count()>0) {
      return $pdfs;
    }else {
      return false;
    }
  }


}
