<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RolePermisoTable extends Migration
{

    public function up()
    {
      Schema::create('role_permiso', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('idRole')->unsigned();
        $table->integer('idPermiso')->unsigned();
        $table->timestamps();
        $table->softDeletes();
        $table->foreign('idRole')->references('id')->on('roles')->onDelete('cascade');
        $table->foreign('idPermiso')->references('id')->on('permisos')->onDelete('cascade');
 });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('role_permiso', function (Blueprint $table) {
    $table->dropForeign('role_permiso_idRole_foreign');
    $table->dropColumn('idRole');
    $table->dropForeign('role_permiso_idPermiso_foreign');
    $table->dropColumn('idPermiso');
    });
      Schema::dropIfExists('role_permiso');
    }
}
