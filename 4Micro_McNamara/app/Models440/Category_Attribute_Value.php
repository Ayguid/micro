<?php

namespace App\Models440;

use Illuminate\Database\Eloquent\Model;
use App\Models440\Attribute;
use App\Models440\Attribute_Value;


class Category_Attribute_Value extends Model
{

    protected $table='categories_attributes_values';

    protected $fillable = ['category_id', 'attribute_value_id'
    ];

    public function attribute()
    {
      return $this->hasOneThrough(Attribute::class, Attribute_Value::class, 'id', 'id', 'attribute_value_id', 'attribute_id');
    }




}
