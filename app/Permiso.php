<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permiso extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable=['nombrePermiso'];

public function roles(){

    return $this->belongsToMany('App\Role','role_permiso','idPermiso','idRole')->withTimestamps();

}

}
