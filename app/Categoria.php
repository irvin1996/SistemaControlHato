<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    //
    use SoftDeletes;
      protected $dates = ['deleted_at'];
       protected $fillable = ['nombreCategoria'];

       public function vacas(){
      return $this->hasMany('App\Vaca\idcategoria');
    }
}
