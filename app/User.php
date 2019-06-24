<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\ResetPasswordNotification;
class User extends Authenticatable
{
    use Notifiable;

     use SoftDeletes;
     protected $dates = ['deleted_at'];

     protected $fillable = ['identificacion','name','apellido1','apellido2','fechaNacimiento','email','celular','idRole','password'];

     public function roles()
    {
      return $this->belongsTo('App\Role','idRole');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
  }
