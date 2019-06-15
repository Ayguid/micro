<?php

namespace App\Models440;

use Illuminate\Database\Eloquent\Model;



class File extends Model
{

    protected $table='files';

    // protected $fillable = ['file_path', 'fileable_id', 'fileable_type'
    // ];


    public function fileable()
    {
        return $this->morphTo();
    }

}
