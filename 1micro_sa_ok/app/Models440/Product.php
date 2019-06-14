<?php

namespace App\Models440;

use Illuminate\Database\Eloquent\Model;


use App\Helper_Functions\getClassHelper;


class Product extends Model
{
    //
    use getClassHelper;

    protected $table='products';


    public function getTableName()
    {
      return $this->table;
    }


    public function details()
    {
      $class=$this->classGetter($this->table_id);
      $new=new $class();
      return $this->hasOne($new, 'id', 'child_id')->first();
    }




}
