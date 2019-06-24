<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];
  protected $fillable=['nombreRol'];

public function users(){
    return $this->hasMany('App\User','idRole');
}

public function Permiso(){
    return $this->belongsToMany('App\Permiso','role_permiso','idRole','idPermiso')->withTimestamps();
}

}
