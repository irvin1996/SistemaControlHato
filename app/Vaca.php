<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Vaca extends Model
{
     use SoftDeletes;
     protected $dates = ['deleted_at'];
     protected $fillable = ['numeroVaca','fechaNacimiento','madre','abuelo','abuela','idcategoria','idraza','idPajilla','estadoVaca'];

     public function categoria(){
       return $this->belongsTo('App\Categoria','idcategoria');
     }

     public function raza(){
       return $this->belongsTo('App\Raza','idraza');
     }


     public function pajilla(){
       return $this->belongsTo('App\Pajilla','idPajilla');
     }

}
