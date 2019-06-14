<?php

namespace App\Models440;

use Illuminate\Database\Eloquent\Model;
use App\Models440\Attribute;



class Product_Attribute extends Model
{

    protected $table='products_attributes';

    protected $fillable = [
    'product_id', 'attribute_id', 'value', 'sequence'
    ];




    public function attribute()
    {
      return $this->belongsTo(Attribute::class);
    }
    //
    //
    // public function productAttr()
    // {
    //   return $this->hasOne(Product_Attribute_Value::class, 'attribute_value_id');
    // }
    //





}
