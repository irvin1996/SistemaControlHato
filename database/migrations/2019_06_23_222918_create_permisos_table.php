<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('permisos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombrePermiso')->unique()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
         Schema::dropIfExists('permisos');
    }
}
