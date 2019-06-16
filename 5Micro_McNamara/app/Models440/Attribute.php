<?php

namespace App\Models440;

use Illuminate\Database\Eloquent\Model;



class Attribute extends Model
{
  protected $table='attributes';

  protected $fillable = ['category_id', 'name', 'type'
];


public function types()
{
  return [
    'string',
    'int',
    'float',
    'date',
    'mail',
    'password',
    'textarea'
  ];
}





}
