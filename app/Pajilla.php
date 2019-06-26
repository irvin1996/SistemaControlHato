<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pajilla extends Model
{
    //
    use SoftDeletes;
      protected $dates = ['deleted_at'];
       protected $fillable = ['nombrePajilla' , 'semen'];

       public function vacas(){
       return $this->hasMany('App\Vaca\idPajilla');
     }

}
