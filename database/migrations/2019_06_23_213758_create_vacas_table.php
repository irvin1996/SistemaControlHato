<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacas', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('numeroVaca');
            $table->String('fechaNacimiento');
            $table->integer('madre');
            $table->String('abuelo');
            $table->String('abuela');
            $table->integer('idcategoria')->unsigned();
            $table->integer('idraza')->unsigned();
            $table->integer('idPajilla')->unsigned();
            $table->foreign('idcategoria')->references('id')->on('categorias')->ondelete('cascade');
            $table->foreign('idraza')->references('id')->on('razas')->ondelete('cascade');
            $table->foreign('idPajilla')->references('id')->on('pajillas')->ondelete('cascade');
            $table->String('estadoVaca');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

      Schema::table('vacas', function (Blueprint $table) {

        $table->dropForeign('vacas_idraza_foreign');
        $table->dropColumn('idraza');

        $table->dropForeign('vacas_idcategoria_foreign');
        $table->dropColumn('idcategoria');

        $table->dropForeign('vacas_idpajilla_foreign');
        $table->dropColumn('idpajilla');


      });

        Schema::dropIfExists('vacas');
    }
}
