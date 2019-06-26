<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Raza extends Model
{
  use SoftDeletes;
    protected $dates = ['deleted_at'];
     protected $fillable = ['nombreRaza'];

    public function vacas(){
    return $this->hasMany('App\Vaca\idraza');
  }

}
