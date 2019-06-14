<?php

namespace App\Models440;

use Illuminate\Database\Eloquent\Model;





class Product extends Model
{
    //
    protected $table='products';


    public function getTableName()
    {
      return $this->table;
    }


    public function details()
    {
      return  Product::join($this->table_name, $this->table_name.'.id','=', $this->getTableName().'.child_id')
              ->where($this->table_name.'.id','=', $this->child_id)->select($this->table_name.'.*')->first();
    }




}
