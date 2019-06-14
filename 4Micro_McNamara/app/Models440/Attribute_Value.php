<?php

namespace App\Models440;

use Illuminate\Database\Eloquent\Model;
use App\Models440\Attribute;
use App\Models440\Product_Attribute_Value;



class Attribute_Value extends Model
{

    protected $table='attributes_values';

    protected $fillable = [
    'attribute_id', 'attribute_value_name', 'attribute_value_desc'
    ];




    public function attribute()
    {
      return $this->belongsTo(Attribute::class);
    }


    public function productAttr()
    {
      return $this->hasOne(Product_Attribute_Value::class, 'attribute_value_id');
    }






}
