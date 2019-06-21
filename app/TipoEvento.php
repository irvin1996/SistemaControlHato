<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEvento extends Model
{
  use SoftDeletes;
    protected $dates = ['deleted_at'];
     protected $fillable = [
          'nombretipoEvento'
      ];
}
