<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('identificacion')->unique()->nullable();
          $table->string('name');
          $table->string('apellido1');
          $table->string('apellido2');
          $table->string('fechaNacimiento');
          $table->string('email')->unique();
          $table->string('celular');
          $table->integer('idRole')->unsigned();
          $table->foreign('idRole')->references('id')->on('roles')->ondelete('cascade');
          $table->string('password');
          $table->timestamp('email_verified_at')->nullable();
          $table->rememberToken();
          $table->timestamps();
          $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function (Blueprint $table) {

        $table->dropForeign('users_idRole_foreign');
        $table->dropColumn('idRole');

   });
      Schema::dropIfExists('users');
    }

}
