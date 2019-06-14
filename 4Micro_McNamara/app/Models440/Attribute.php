<?php

namespace App\Models440;

use Illuminate\Database\Eloquent\Model;

use App\Models440\Attribute_Value;

class Attribute extends Model
{

    protected $table='attributes';

    protected $fillable = ['attribute_name', 'attribute_desc'
    ];


    public function values()
    {
      return $this->hasMany(Attribute_Value::class);
    }





}
