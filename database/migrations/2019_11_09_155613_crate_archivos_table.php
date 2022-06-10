<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::connection('task')->create('acrhivos', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre_archivo');
          $table->unsignedInteger('ticket_id');
          $table->timestamp('created_at')->nullable();


            $table->foreign('ticket_id')->references('id')->on('task.tickets');
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
