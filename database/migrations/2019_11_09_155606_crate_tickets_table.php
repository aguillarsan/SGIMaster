<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::connection('task')->create('tickets', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nombre_falla');
      $table->unsignedInteger('pop_id');
      $table->timestamp('fecha_inicio')->nullable();
      $table->timestamp('fecha_compromiso')->nullable();
      $table->timestamp('fecha_solucion')->nullable();
      $table->integer('dia');
      $table->integer('hora');
      $table->string('tiempo_falla');
      $table->string('entidad_afectada');
      $table->string('reclamos');
      $table->string('descripcion');
      $table->string('responsable');
      $table->string('compromiso');
      $table->integer('tipo_tecnologia');
      $table->unsignedInteger('crm_id');
      $table->unsignedInteger('estado_id');
      $table->unsignedInteger('inputacion_id');
      $table->unsignedInteger('user_id');



      $table->timestamp('created_at')->nullable();


      $table->foreign('estado_id')->references('id')->on('task.estados');
  });
 }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
